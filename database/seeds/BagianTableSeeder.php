<?php

use Illuminate\Database\Seeder;

class BagianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bagian::create([
	        'nama_bagian' => 'Human Capital',
		]);

        \App\Bagian::create([
            'nama_bagian' => 'Logistik',
        ]);
    }
}
