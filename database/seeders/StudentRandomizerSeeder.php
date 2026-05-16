<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRandomizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Delete all parent users as requested
        \App\Models\User::where('role', 'parent')->delete();

        // 2. Randomize names of existing students
        $faker = \Faker\Factory::create('id_ID');
        $students = \App\Models\Student::all();
        
        foreach ($students as $student) {
            $student->update([
                'name' => $faker->name($student->gender == 'Laki-laki' ? 'male' : 'female'),
                'parent_name' => $faker->name,
            ]);
        }

        // 3. Add more random students to make the list long
        for ($i = 0; $i < 20; $i++) {
            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);
            \App\Models\Student::create([
                'name' => $faker->name($gender == 'Laki-laki' ? 'male' : 'female'),
                'grade' => $faker->randomElement(['TK A', 'TK B']),
                'gender' => $gender,
                'birth_date' => $faker->date('Y-m-d', '2021-12-31'),
                'address' => $faker->address,
                'parent_name' => $faker->name,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
