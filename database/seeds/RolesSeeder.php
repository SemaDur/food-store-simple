<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('
			INSERT INTO roles (id, role) VALUES
			(1, "Admin"),
			(2, "User")
		');
    }
}
