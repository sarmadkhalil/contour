<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;
use DB;
use File;

class LogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logs')->delete();
        $json = File::get("database/data/logs.json");
        $data = json_decode($json);
        // $json = file_get_contents();
        // $objs = json_decode(file_get_contents($path),true);
        foreach ($data as $obj)  {
            Log::create(array(
                'time' => $obj->time,
                'type' => $obj->type,
                'revenue' => $obj->revenue,
                'user_id' => $obj->user_id
            ));
        }
    }
}
