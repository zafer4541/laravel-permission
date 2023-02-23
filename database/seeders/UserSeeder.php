<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //superAdmin
        $superAdmin=new User;
        $superAdmin->name='superAdmin';
        $superAdmin->email='superAdmin@gmail.com';
        $superAdmin->password=Hash::make('123456');
        $superAdmin->save();

        //writer
        $superAdmin=new User;
        $superAdmin->name='writer';
        $superAdmin->email='writer@gmail.com';
        $superAdmin->password=Hash::make('123456');
        $superAdmin->save();

        //employee
        $superAdmin=new User;
        $superAdmin->name='employee';
        $superAdmin->email='employee@gmail.com';
        $superAdmin->password=Hash::make('123456');
        $superAdmin->save();
    }
}
