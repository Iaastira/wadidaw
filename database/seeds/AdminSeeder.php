<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat role admin
        $adminRole = new Role();
        $adminRole->name = 'Admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();
        //Membuat role member
        $memberRole = new Role();
        $memberRole->name = 'Member';
        $memberRole->display_name = 'Member';
        $memberRole->save();
        //Membuat sample admin
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('arkamaya123');
        $admin->save();
        $admin->attachRole('admin');
         //Membuat sample member
         $member = new User();
         $member->name = 'Member';
         $member->email = 'member@gmail.com';
         $member->password = bcrypt('arkamaya123');
         $member->save();
         $member->attachRole('member');
    }
}