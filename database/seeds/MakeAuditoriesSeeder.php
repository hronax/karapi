<?php

use Illuminate\Database\Seeder;

class MakeAuditoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['6-46', '6-47', '6-48', '6-49', '6-50', '6-51', '6-52', '6-54', '6-55', '6-56', '6-57', '6-58', '6-59', '6-60', '7-8', '7-9'] as $room) {
            DB::table('auditories')->insert([
                'code' => $room,
                'building_id' => 1
            ]);
        }

        foreach (['207'] as $room) {
            DB::table('auditories')->insert([
                'code' => $room,
                'building_id' => 2
            ]);
        }

        foreach (['301', '409', '412', '313'] as $room) {
            DB::table('auditories')->insert([
                'code' => $room,
                'building_id' => 4
            ]);
        }
    }
}
