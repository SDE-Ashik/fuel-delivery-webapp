<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Models\User;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $config = [
          ['id' => '1', 'pincode' => '683514','petrol'=>110.4,'diesel'=>99,'premium_petrol'=>120,'delivery_fee'=>20, 'created_at' => Carbon::now(),],

      ];

      

    $config = array_values($config);
    DB::table('configs')->insert($config);

    }
}
