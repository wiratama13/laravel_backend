<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'name' => 'Frontend Web Programmer',
        ]);

        Job::create([
            'name' => 'Fullstack Web Programmer',
        ]);

        Job::create([
            'name' => 'Quality Control',
        ]);
    }
}
