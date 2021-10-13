<?php

use Illuminate\Database\Seeder;

class SubjectAdd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'id'=>1,
                'subject' => 'History ',    
               ]
        );
    }
}
