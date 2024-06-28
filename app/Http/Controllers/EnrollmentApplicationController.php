<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentApplication;
use Illuminate\Validation\ValidationException;
use App\Repositories\EnrollmentApplicationRepository;
use App\Http\Requests\StoreEnrollmentApplicationRequest;
use App\Http\Requests\UpdateEnrollmentApplicationRequest;
use Illuminate\Support\Facades\DB;

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
            // Retornar una respuesta de redirección con un mensaje de éxito
            return redirect()->route('registrationApplication')->with('success', 'Solicitud enviada con éxito.');

        } catch (ValidationException $e) {
            // Capturar la excepción de validación y retornar a la vista con los errores
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

}
