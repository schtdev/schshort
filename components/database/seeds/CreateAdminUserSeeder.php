<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::insert([
        	[
                'id' => '1',
                'name' => 'John',
        	    'email' => 'admin@gmail.com',
                'role' => 'admin',
        	    'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'name' => 'Anonymouse',
                'role' => NULL,
        	    'email' => 'anonym@gmail.com',
        	    'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
