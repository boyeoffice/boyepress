<?php

use Illuminate\Database\Seeder;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
        [
        	'site_name'	=> 'Boyepress',
        	'site_email'	=>	'admin@boyeoffice.com',
        	'meta_description'	=> 'This is a blog'
        ]
        ];
        DB::table('settings')->insert($settings);
    }
}
