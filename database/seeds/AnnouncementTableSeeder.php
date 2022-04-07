<?php

use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Announcements::class, 3)->create();
    }
}
