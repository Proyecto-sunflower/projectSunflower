<?php

namespace App\Repositories;

use App\Interfaces\EnrollmentApplicationInterface;
use App\Models\User;
use App\Traits\Base64ToFile;
use App\Interfaces\UserInterface;
use App\Models\EnrollmentApplication;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\PromotionRepository;
use App\Repositories\StudentParentInfoRepository;
use App\Repositories\StudentAcademicInfoRepository;

class EnrollmentApplicationRepository implements EnrollmentApplicationInterface {
    use Base64ToFile;

    /**
     * @param mixed $request
     * @return string
    */
    public function store($request) {
        try {
            DB::transaction(function () use ($request) {
                EnrollmentApplication::create([
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'review_status' => false,
                ]);
            });

        } catch (\Exception $e) {
            throw new \Exception('Failed to create Enrollment Application. '.$e->getMessage());
        }
    }

}

