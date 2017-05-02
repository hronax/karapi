<?php

use Illuminate\Database\Seeder;

class MakeBuildingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Главный корпус', 'Северный корпус', 'Экономический корпус', 'Институт высоких технологий'] as $building) {
            DB::table('buildings')->insert([
                'name' => $building
            ]);
        }
    }
}
