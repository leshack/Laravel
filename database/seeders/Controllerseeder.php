<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Controllerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/schema/brands.sql');
            DB::statement($sql);
            $sql = file_get_contents(database_path() . '/schema/vehicle.sql');
            DB::statement($sql);
            $sql = file_get_contents(database_path() . '/schema/testimony.sql');
            DB::statement($sql);
            $sql = file_get_contents(database_path() . '/schema/pages.sql');
            DB::statement($sql);
            $sql = file_get_contents(database_path() . '/schema/bookings.sql');
            DB::statement($sql);
            $sql = file_get_contents(database_path() . '/schema/admin.sql');
            DB::statement($sql);
            DB::statement($sql);
            $sql = file_get_contents(database_path() . '/schema/countactus.sql');
            DB::statement($sql);
    }
}
