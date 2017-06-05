<?php

use Illuminate\Database\Seeder;
use App\Models\Area;
class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre' => "Informatica",
            'sector' => "A",
        ]);
    }
}
