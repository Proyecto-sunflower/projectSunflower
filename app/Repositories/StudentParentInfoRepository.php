<?php

namespace App\Repositories;

use App\Models\StudentParentInfo;

class StudentParentInfoRepository {
    public function store($request, $student_id) {
        try {
            StudentParentInfo::create([
                'student_id'    => $student_id,
                'main_parent_name'   => $request['main_parent_name'],
                'main_parent_phone'  => $request['main_parent_phone'],
                'substitute_name'   => $request['substitute_name'],
                'substitute_phone'  => $request['substitute_phone'],
                'main_parent_address'=> $request['main_parent_address'],
                'substitute_address'=> $request['substitute_address'] ?? '', //!empty($request['substitute_address']) ? $request['substitute_address'] : null
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Student Parent information. '.$e->getMessage());
        }
    }

    public function getParentInfo($student_id) {
        return StudentParentInfo::where('student_id', $student_id)
                ->first();
    }

    public function update($request, $student_id) {
        try {
            StudentParentInfo::where('student_id', $student_id)->update([
                'main_parent_name'   => $request['main_parent_name'],
                'main_parent_phone'  => $request['main_parent_phone'],
                'substitute_name'   => $request['substitute_name'],
                'substitute_phone'  => $request['substitute_phone'],
                'main_parent_address'=> $request['main_parent_address'],
                'substitute_address'=> $request['substitute_address'] ?? '', //!empty($request['substitute_address']) ? $request['substitute_address'] : null
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update Student Parent information. '.$e->getMessage());
        }
    }
}
