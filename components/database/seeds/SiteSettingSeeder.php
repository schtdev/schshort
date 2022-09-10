<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Carbon\Carbon;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::insert([
        	[
                'sitename' => 'Link2U',
                'sitedes' => 'Free link shortner service.',
                'col2' => 'Page',
        	    'col3' => 'Contact',
        	    'col3s1' => '203 Fake St. Mountain View, San Francisco, California, USA',
        	    'col3s2' => '+00 1122 3344 5566',
        	    'col3s3' => 'contact@web.in',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
