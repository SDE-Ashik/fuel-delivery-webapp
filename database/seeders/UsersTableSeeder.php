<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $users = [
          ['id' => '1', 'first_name' => 'Super', 'last_name' => 'Admin', 'email' => 'developer@gmail.com', 'phone' => "0000000000000", 'email_verified_at' => Carbon::now(), 'password' => bcrypt('admin@123'),   'role' => '1', 'created_at' => Carbon::now(),],
         

      ];

      

    $users = array_values($users);
    DB::table('users')->insert($users);

    }
}
