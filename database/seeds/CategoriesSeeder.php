<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('
			INSERT INTO categories (name) VALUES
			("Pica"),
			("Pred Jela"),
			("Fast food"),
			("Desert"),
			("Ostalo")
		');
    }
}
