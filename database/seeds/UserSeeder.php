<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $check_user = User::find(1);
        if(empty($check_user)){
            $user = User::create([
                'name' => 'admin',
                'username' => 'admin',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789'),
                'remember_token' => Str::random(10),
                'status' => 1,
                'type' => 2,
                'email' => 'user@gmail.com'
            ]);
        }
       
    }
}
