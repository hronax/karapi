<?php

use Illuminate\Database\Seeder;

class MakePairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $starts_reg = ['8:00', '9:55', '11:40', '13:25', '15:10'];
        $ends_reg = ['9:35', '11:30', '13:15', '15:00', '16:55'];
        foreach ([1,2,3] as $b_id) {
            for ($i = 0; $i < count($starts_reg); $i++) {
                DB::table('pairs')->insert([
                    'building_id' => $b_id,
                    'time_start' => $starts_reg[$i],
                    'time_end' => $ends_reg[$i],
                    'pair_number' => $i+1
                ]);
            }
        }

        $starts_pt = ['8:30', '10:15', '12:20', '14:05', '15:50'];
        $ends_pt = ['10:05', '11:50', '13:55', '15:40', '17:25'];
        for ($i = 0; $i < count($starts_reg); $i++) {
            DB::table('pairs')->insert([
                'building_id' => 4,
                'time_start' => $starts_pt[$i],
                'time_end' => $ends_pt[$i],
                'pair_number' => $i+1
            ]);
        }
    }
}
