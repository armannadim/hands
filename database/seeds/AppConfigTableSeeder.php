<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AppConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appconfig')->insert([
            'parameters' => 'orgName',
            'parameters_name' => 'Organization Name',
            'value' => 'Helping Hands'
        ]);

        DB::table('appconfig')->insert([
            'parameters' => 'orgAddress',
            'parameters_name' => 'Organization Address',
            'value' => 'Somewhere on the earth.'
        ]);

        DB::table('appconfig')->insert([
            'parameters' => 'orgPhone',
            'parameters_name' => 'Organization Phone',
            'value' => '+12 XXX XX XX XX'
        ]);

        DB::table('appconfig')->insert([
            'parameters' => 'orgLogo',
            'parameters_name' => 'Organization Logo',
            'value' => 'Logo file name with location'
        ]);

        DB::table('appconfig')->insert([
            'parameters' => 'orgWeb',
            'parameters_name' => 'Organization Website',
            'value' => 'http://www.google.com'
        ]);

        DB::table('appconfig')->insert([
            'parameters' => 'orgContactEmail',
            'parameters_name' => 'Organization Contact Email',
            'value' => 'info@domain.com'
        ]);
    }
}
