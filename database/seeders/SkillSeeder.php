<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'PHP'
        ]);

        Skill::create([
            'name' => 'PostgreSQL'
        ]);

        Skill::create([
            'name' => 'API (JSON/REST)'
        ]);

        Skill::create([
            'name' => 'Version Control System (Gitlab/Github)'
        ]);
    }
}
