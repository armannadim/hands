<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'id' => 1,
            'name' => 'Rickshaw',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 0
        ]);
        DB::table('projects')->insert([
            'id' => 2,
            'name' => 'Swing Machine',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 0
        ]);
        DB::table('projects')->insert([
            'id' => 3,
            'name' => 'Domestic Animal',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 0
        ]);
        DB::table('projects')->insert([
            'id' => 4,
            'name' => 'Cow',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 3
        ]);
        DB::table('projects')->insert([
            'id' => 5,
            'name' => 'Buffallow',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 3
        ]);
        DB::table('projects')->insert([
            'id' => 6,
            'name' => 'Goat',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 3
        ]);
        DB::table('projects')->insert([
            'id' => 7,
            'name' => 'Bird Firm',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 3
        ]);
        DB::table('projects')->insert([
            'id' => 8,
            'name' => 'Farming',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 0
        ]);
        DB::table('projects')->insert([
            'id' => 9,
            'name' => 'Vegetable',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 8
        ]);
        DB::table('projects')->insert([
            'id' => 10,
            'name' => 'Fruit',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 8
        ]);
        DB::table('projects')->insert([
            'id' => 11,
            'name' => 'Shop',
            'description' => '',
            'start_date' => now(),
            'parent_project_id' => 0
        ]);
    }
}


