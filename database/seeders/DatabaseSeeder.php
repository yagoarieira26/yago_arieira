<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DivisionSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DivisionSeed::class,
        ]); // rodar todas as seeds com um só comando

    }
}
