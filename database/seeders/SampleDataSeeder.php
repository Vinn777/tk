<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = ['KB', 'TK A', 'TK B'];
        $genders = ['Laki-laki', 'Perempuan'];
        
        $first_student = null;

        foreach ($grades as $grade) {
            for ($i = 1; $i <= 5; $i++) {
                $gender = $genders[array_rand($genders)];
                $name = "Siswa " . $grade . " " . $i;
                
                $student = \App\Models\Student::create([
                    'name' => $name,
                    'grade' => $grade,
                    'gender' => $gender,
                    'birth_date' => '2020-05-15',
                    'address' => 'Jl. Ceria No. ' . rand(1, 200),
                    'parent_name' => 'Wali ' . $name,
                    'phone' => '0812' . rand(10000000, 99999999),
                ]);

                if (!$first_student) {
                    $first_student = $student;
                }

                // Create User for Parent
                \App\Models\User::create([
                    'name' => 'Orang Tua ' . $name,
                    'username' => 'parent' . strtolower(str_replace(' ', '', $grade)) . $i,
                    'role' => 'parent',
                    'student_id' => $student->id,
                    'email' => 'parent' . strtolower(str_replace(' ', '', $grade)) . $i . '@example.com',
                    'password' => \Illuminate\Support\Facades\Hash::make('password'),
                ]);

                // Create some activities
                \App\Models\Activity::create([
                    'student_id' => $student->id,
                    'activity_name' => 'Kegiatan Rutin ' . $grade,
                    'activity_date' => date('Y-m-d'),
                    'description' => $name . ' mengikuti kegiatan dengan sangat baik hari ini.',
                ]);
            }
        }

        // Create one teacher account
        \App\Models\User::create([
            'name' => 'Ibu Guru An-Nahl',
            'username' => 'guru',
            'role' => 'admin',
            'email' => 'guru@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
