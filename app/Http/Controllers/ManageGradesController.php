<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Repositories\NoticeRepository;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Interfaces\CourseInterface;
use App\Repositories\PromotionRepository;
use App\Interfaces\SemesterInterface;
use Carbon\Carbon;

class ManageGradesController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $userRepository;
    protected $semesterRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserInterface $userRepository, 
        SchoolSessionInterface $schoolSessionRepository, 
        SchoolClassInterface $schoolClassRepository, 
        CourseInterface $courseRepository,
        SemesterInterface $semesterRepository
        )
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->courseRepository = $courseRepository;
        $this->semesterRepository = $semesterRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try{
            $current_school_session_id = $this->getSchoolCurrentSession();
            $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

            $courses = $this->courseRepository->getAll($current_school_session_id);

            $class_id = $request->query('class_id', 0);
            $section_id = $request->query('section_id', 0);

            $studentList = $this->userRepository->getAllStudents($current_school_session_id, $class_id, $section_id);

            $data = [
                'current_school_session_id' => $current_school_session_id,
                'school_classes'            => $school_classes,
                'courses'                   => $courses,
                'studentList'       => $studentList,
            ];

            return view('manage.manage-grades', $data);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function edit($student_id)
    {
        $student = $this->userRepository->findStudent($student_id);
        $current_school_session_id = $this->getSchoolCurrentSession();
        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

        $courses = $this->courseRepository->getAll($current_school_session_id);

        $semesters = $this->semesterRepository->getAll($current_school_session_id);

        $today = Carbon::now();

        $current_semester = null;
        
        foreach ($semesters as $semester){
            $startDate = Carbon::parse($semester->start_date);
            $endDate = Carbon::parse($semester->end_date);
            if($today->between($startDate, $endDate)){

                $current_semester = $semester;
                break;
            }
        }


        $data = [
            'student'       => $student,
            'current_school_session_id' => $current_school_session_id,
            'school_classes'            => $school_classes,
            'courses'                   => $courses,
            'semesters'                 => $semesters,
            'today'                     => $today,
            'current_semester'          => $current_semester,
        ];

        return view('manage.manage-student-grades', $data);
    }

    
}
