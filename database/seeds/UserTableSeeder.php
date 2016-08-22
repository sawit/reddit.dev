<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {

      factory(\App\User::class, 50)->create();

      $user1 = new App\User();
      $user1->email = 'emily@codeup.com';
      $user1->name = 'emily';
      $user1->password = Hash::make('password123');
      $user1->remember_token = str_random(10);
      $user1->save();

    }
}
