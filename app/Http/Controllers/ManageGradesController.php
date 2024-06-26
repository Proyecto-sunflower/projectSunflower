<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Repositories\NoticeRepository;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Interfaces\CourseInterface;
use App\Repositories\PromotionRepository;

class ManageGradesController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserInterface $userRepository, SchoolSessionInterface $schoolSessionRepository, SchoolClassInterface $schoolClassRepository, CourseInterface $courseRepository)
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->courseRepository = $courseRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $classCount = $this->schoolClassRepository->getAllBySession($current_school_session_id)->count();

        $studentCount = $this->userRepository->getAllStudentsBySessionCount($current_school_session_id);

        $promotionRepository = new PromotionRepository();

        $maleStudentsBySession = $promotionRepository->getMaleStudentsBySessionCount($current_school_session_id);

        $teacherCount = $this->userRepository->getAllTeachers()->count();

        $noticeRepository = new NoticeRepository();
        $notices = $noticeRepository->getAll($current_school_session_id);
        

        $current_school_session_id = $this->getSchoolCurrentSession();
        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);

        $courses = $this->courseRepository->getAll($current_school_session_id);

        $data = [
            'current_school_session_id' => $current_school_session_id,
            'school_classes'            => $school_classes,
            'courses'                   => $courses,
        ];

        return view('manage.manage-grades', $data);
    }
}
