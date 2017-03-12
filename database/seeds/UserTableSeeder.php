<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user['name']     = 'Tim Joosten';
        $user['email']    = 'Topairy@gmail.com';
        $user['password'] = bcrypt('root1995!');

        // Start database insert & truncate.
        $table = DB::table('users');
        $table->delete();
        $table->insert($user);
    }
}
