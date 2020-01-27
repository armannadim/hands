<?php

use Illuminate\Database\Seeder;

class IdentityTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identity_type')->insert([
            'name' => 'Passport',
            'country' => ''
        ]);
        DB::table('identity_type')->insert([
            'name' => 'NIE',
            'country' => 'spain'
        ]);
        DB::table('identity_type')->insert([
            'name' => 'DNI',
            'country' => 'spain'
        ]);
        DB::table('identity_type')->insert([
            'name' => 'CNIC',
            'country' => 'pakistan'
        ]);
        DB::table('identity_type')->insert([
            'name' => 'NID',
            'country' => 'bangladesh'
        ]);
    }
}
