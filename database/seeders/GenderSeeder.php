<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Male', 'Female'] as $name) {
            Gender::updateOrCreate(['name' => $name], ['name' => $name]);
        }
    }
}
