<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitType;
use Carbon\Carbon;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Data to be inserted
        $unitTypeData = [
            ['name' => 'Qty', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ltr', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'KG', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Meter', 'created_at' => $now, 'updated_at' => $now],
        ];

        // Insert data into the unit_types table
        UnitType::insert($unitTypeData);
    }
}
