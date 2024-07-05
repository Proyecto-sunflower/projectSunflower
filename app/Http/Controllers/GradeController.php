<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:users,id',
            'grades' => 'required|array',
            'grades.*.subject' => 'required|string',
            'grades.*.grades' => 'required|array',
            'grades.*.grades.*' => 'nullable|numeric|min:2|max:7',
        ]);

        DB::transaction(function() use ($data) {
            foreach ($data['grades'] as $gradeData) {
                foreach ($gradeData['grades'] as $grade) {
                    Grade::updateOrCreate(
                        [
                            'user_id' => $data['student_id'],
                            'subject_name' => $gradeData['subject']
                        ],
                        [
                            'grade' => $grade
                        ]
                    );
                }
            }
        });

        return redirect()->back()->with('success', 'Notas actualizadas correctamente.');
    }
}
