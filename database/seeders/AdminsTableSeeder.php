<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
				'name' => "Madhuri",
				'email' => 'madhurit@e2msol.com',
				'password' => bcrypt('12345678'),
        	),
        ));
    }
}
