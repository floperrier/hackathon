<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Training::factory()->count(10)->create();

        $developers = \App\Models\User::role('developer')->get();

        \App\Models\Training::all()->each(function ($training) use ($developers) {
            $training->users()->attach(
                $developers->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
