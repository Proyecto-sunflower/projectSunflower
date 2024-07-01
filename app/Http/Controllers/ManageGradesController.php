<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\SemesterInterface;
use Carbon\Carbon;
use App\Models\Subject;
use App\Models\Grade;

class ManageGradesController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $userRepository;
    protected $semesterRepository;

    public function __construct(
        UserInterface $userRepository,
        SchoolSessionInterface $schoolSessionRepository,
        SchoolClassInterface $schoolClassRepository,
        CourseInterface $courseRepository,
        SemesterInterface $semesterRepository
    ) {
        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->courseRepository = $courseRepository;
        $this->semesterRepository = $semesterRepository;
    }

    public function index(Request $request)
    {
        try {
            $current_school_session_id = $this->getSchoolCurrentSession();
            $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);
            $courses = $this->courseRepository->getAll($current_school_session_id);
            $class_id = $request->query('class_id', 0);
            $section_id = $request->query('section_id', 0);
            $studentList = $this->userRepository->getAllStudents($current_school_session_id, $class_id, $section_id);

            $data = [
                'current_school_session_id' => $current_school_session_id,
                'school_classes' => $school_classes,
                'courses' => $courses,
                'studentList' => $studentList,
            ];

            return view('manage.manage-grades', $data);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function edit($student_id)
    {
        $student = $this->userRepository->findStudent($student_id);

        if (!$student) {
            return redirect()->back()->withError('Estudiante no encontrado.');
        }

        $current_school_session_id = $this->getSchoolCurrentSession();
        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);
        $courses = $this->courseRepository->getAll($current_school_session_id);
        $semesters = $this->semesterRepository->getAll($current_school_session_id);
        $today = Carbon::now();
        $current_semester = null;

        foreach ($semesters as $semester) {
            $startDate = Carbon::parse($semester->start_date);
            $endDate = Carbon::parse($semester->end_date);
            if ($today->between($startDate, $endDate)) {
                $current_semester = $semester;
                break;
            }
        }

        if (!$current_semester) {
            return redirect()->back()->withError('No se encontró un semestre actual.');
        }

        $subjects = Subject::all();
        $grades = Grade::where('user_id', $student_id)->get()->groupBy('subject_id');

        $data = [
            'student' => $student,
            'current_school_session_id' => $current_school_session_id,
            'school_classes' => $school_classes,
            'courses' => $courses,
            'semesters' => $semesters,
            'today' => $today,
            'current_semester' => $current_semester,
            'subjects' => $subjects,
            'grades' => $grades
        ];

        return view('manage.manage-student-grades', $data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:users,id',
            'grades' => 'required|array',
            'grades.*' => 'array',
            'grades.*.*' => 'nullable|numeric|min:1|max:7',
        ]);

        foreach ($data['grades'] as $subject_id => $grades) {
            foreach ($grades as $index => $gradeValue) {
                if ($gradeValue !== null) {
                    Grade::updateOrCreate(
                        ['user_id' => $request->student_id, 'subject_id' => $subject_id, 'grade_index' => $index],
                        ['grade' => $gradeValue]
                    );
                }
            }
        }

        return redirect()->back()->with('success', 'Notas actualizadas correctamente.');
    }
}
