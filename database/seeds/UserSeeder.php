<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('Users')->delete();

        User::create([
            'id' => 1,
            'fname' => 'Super',
            'lname' => 'Admin',
            'login' => 'admin',
            'email' => 'super@admin.com',
            'password' => '123456',
        ]);

    }

}
