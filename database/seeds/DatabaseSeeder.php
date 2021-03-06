<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(RolePermissionSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(ClassroomsTableSeeder::class);
       $this->call(EnrollmentsTableSeeder::class);
       $this->call(StudentRfidSeeder::class);
       $this->call(StudentGpsDataTableSeeder::class);
       $this->call(AnnouncementTableSeeder::class);
        $this->call(NotesTableSeeder::class);

    }
}
