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
        
        $maleNames = ['Ahmad Syarif', 'Budi Santoso', 'Candra Wijaya', 'Dedi Kurniawan', 'Eko Prasetyo', 'Fajar Ramadhan', 'Guntur Wibowo', 'Hendra Kusuma', 'Iwan Setiawan', 'Joko Susilo'];
        $femaleNames = ['Siti Aminah', 'Ani Lestari', 'Citra Dewi', 'Dian Permata', 'Eka Putri', 'Fitri Handayani', 'Gita Sari', 'Hana Pertiwi', 'Indah Puspita', 'Julianti'];

        $maleIndex = 0;
        $femaleIndex = 0;

        foreach ($grades as $grade) {
            for ($i = 1; $i <= 5; $i++) {
                // Alternate between male and female
                if (($maleIndex + $femaleIndex) % 2 == 0) {
                    $name = $maleNames[$maleIndex % count($maleNames)];
                    $gender = 'Laki-laki';
                    $maleIndex++;
                } else {
                    $name = $femaleNames[$femaleIndex % count($femaleNames)];
                    $gender = 'Perempuan';
                    $femaleIndex++;
                }
                
                $student = \App\Models\Student::create([
                    'name' => $name,
                    'grade' => $grade,
                    'gender' => $gender,
                    'birth_date' => '2020-05-15',
                    'address' => 'Jl. Ceria No. ' . rand(1, 200),
                    'parent_name' => 'Wali ' . $name,
                    'phone' => '0812' . rand(10000000, 99999999),
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

        // Create teacher accounts
        \App\Models\User::create([
            'name' => 'Ust. Rahmat',
            'username' => 'guru',
            'role' => 'admin',
            'email' => 'guru@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        \App\Models\User::create([
            'name' => 'Kepala Sekolah An-Nahl',
            'username' => 'kepsek',
            'role' => 'admin',
            'email' => 'kepsek@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        \App\Models\User::create([
            'name' => 'Bunda Revi',
            'username' => 'revi',
            'role' => 'admin',
            'email' => 'revi@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
