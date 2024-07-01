<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnrollmentApplicationMail;
use Illuminate\Validation\ValidationException;
use App\Repositories\EnrollmentApplicationRepository;
use App\Http\Requests\StoreEnrollmentApplicationRequest;

class EnrollmentApplicationController extends Controller
{
    protected $EnrollmentApplicationRepository;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $schoolSectionRepository;

    public function __construct(EnrollmentApplicationRepository $enrollmentApplicationRepository)
    {
        $this->EnrollmentApplicationRepository = $enrollmentApplicationRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEnrollmentApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnrollmentApplicationRequest $request)
    {

        try {
            $this->EnrollmentApplicationRepository->store($request->validated());

            Mail::to('sunflower_afta@gmail.com')->send(new EnrollmentApplicationMail($request->validated()));
            return redirect()->route('registrationApplication')->with('success', 'Solicitud enviada con éxito.');

        } catch (ValidationException $e) {

            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function index()
    {
        try {
            $applications = $this->EnrollmentApplicationRepository->get();
            return view('enrollment_applications.index', compact('applications'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener las solicitudes.'.$e->getMessage());
        }
    }

    /**
     * Change the status of the specified resource to reviewed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeToReviewed($id)
    {
        try {
            $this->EnrollmentApplicationRepository->changeToReviewed($id);
            return redirect()->route('enrollmentApplications.index')->with('success', 'Estado de la solicitud cambiado con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al cambiar el estado de la solicitud.'.$e->getMessage());
        }
    }

}
