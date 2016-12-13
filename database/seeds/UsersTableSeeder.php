<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\User::class, 25)->create()->each(function ($u) {
	        $u->leaveApplications()->save(factory(App\LeaveApplication::class)->make());
	    });
    }
}
