<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // ['name' => ''],
            ['name' => 'Justitie'],
            ['name' => 'Defensie'],
            ['name' => 'Mensenrechten'],
            ['name' => 'Beleid'],
            ['name' => 'Politiek'],
            ['name' => 'Begroting'],
            ['name' => 'Vrede'],
            ['name' => 'Oorlog'],
            ['name' => 'Armoede'],
            ['name' => 'Kinderrechten'],
            ['name' => 'Midden-oosten'],
            ['name' => 'Economie'],
        ];

        // Start with insert & truncate
        $table = DB::table('categories');
        $table->delete();
        $table->insert($data);
    }
}
