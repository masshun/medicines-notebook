<?php

use Illuminate\Database\Seeder;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->delete();
        $medicine_seeds = [
            [
           // 'user_id' => 1,
            'name' => 'ストラテラ',
            'term' => '1日2回',
            'timezone' => '朝',
            'hospital' => 'ほげ病院',
            'quantity' => '1錠',
            'body' => '特になし',
            ],
        ];
        foreach($medicine_seeds as $medicine)
        {
            DB::table('medicines')->insert($medicine);
        }
    }
}
