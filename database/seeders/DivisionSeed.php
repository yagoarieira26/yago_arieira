<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisionModel = app(Division::class);
        
        $divisionModel->firstOrCreate(
            ['name' => 'Serie A']
        );

        $divisionModel->firstOrCreate(
            ['name' => 'Serie B']
        );

        $divisionModel->firstOrCreate(
            ['name' => 'Serie C']
        );

        $divisionModel->firstOrCreate(
            ['name' => 'Serie D']
        );

        $divisionModel->firstOrCreate(
            ['name' => 'Outras']
        );
    }
}
