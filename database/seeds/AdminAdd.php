<?php

use Illuminate\Database\Seeder;

class AdminAdd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'phone' => '1234567890',
                'role' => 'admin',
                'password' => bcrypt('123456789')
            ]
        );
        $admin = DB::table('admins')->insert(
            [
                'id'=>1,
                'name' => 'Admin',
                'email' => 'admin@demo.com',
               ]
        );
        $admin = DB::table('subjects')->insert(
            [
                'id'=>1,
                'subject' => 'Maths ',    
               ]
        );
        $admin = DB::table('subjects')->insert(
            [
                'id'=>2,
                'subject' => 'Science ',    
               ]
        );
        $admin = DB::table('subjects')->insert(
            [
                'id'=>3,
                'subject' => 'History ',    
               ]
        );
    }
}
