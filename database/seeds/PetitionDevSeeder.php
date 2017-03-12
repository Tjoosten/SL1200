<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitionDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['title']       = '';
        $data['description'] = '';

        $table = DB::table('manifests');
        $table->delete();
        $table->insert($data);
    }
}
