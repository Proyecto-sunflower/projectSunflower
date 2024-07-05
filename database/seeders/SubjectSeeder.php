<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['name' => 'LENGUAJE Y COMUNICACIÓN', 'code' => 'LEN001'],
            ['name' => 'INGLÉS', 'code' => 'ING001'],
            ['name' => 'MATEMÁTICAS', 'code' => 'MAT001'],
            ['name' => 'HISTORIA, GEOGRAFÍA Y CIENCIAS SOCIALES', 'code' => 'HIS001'],
            ['name' => 'CIENCIAS NATURALES', 'code' => 'CIE001'],
            ['name' => 'EDUCACIÓN ARTÍSTICA', 'code' => 'ART001'],
            ['name' => 'EDUCACIÓN TECNOLÓGICA', 'code' => 'TEC001'],
            ['name' => 'MÚSICA', 'code' => 'MUS001'],
            ['name' => 'EDUCACIÓN FÍSICA', 'code' => 'EFI001'],
            ['name' => 'RELIGIÓN', 'code' => 'REL001'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
