<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $maleId   = Gender::where('name', 'Male')->value('id');
        $femaleId = Gender::where('name', 'Female')->value('id');

        $students = [
            ['name' => 'Sok Dara',      'email' => 'sok.dara@example.com',      'phone' => '010 123 123', 'gender_id' => $maleId],
            ['name' => 'Chan Pisey',    'email' => 'chan.pisey@example.com',    'phone' => '011 456 456', 'gender_id' => $femaleId],
            ['name' => 'Kim Vanna',     'email' => 'kim.vanna@example.com',     'phone' => '012 777 888', 'gender_id' => $maleId],
            ['name' => 'Sros Bopha',    'email' => 'sros.bopha@example.com',    'phone' => '015 222 333', 'gender_id' => $femaleId],
            ['name' => 'Tith Sovan',    'email' => 'tith.sovan@example.com',    'phone' => '090 902 283', 'gender_id' => $maleId],
            ['name' => 'Chan Leakhena', 'email' => 'chan.leakhena@example.com', 'phone' => '090 233 322', 'gender_id' => $femaleId],
        ];

        foreach ($students as $s) {
            Student::updateOrCreate(['email' => $s['email']], $s);
        }
    }
}
