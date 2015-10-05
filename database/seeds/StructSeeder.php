<?php

use Illuminate\Database\Seeder;
use App\Models\Structure;

class StructSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('structures')->delete();

        Structure::create([
            'id' => 1,
            'label' => 'home',
            'type' => null,
            'id_name' => 'home',
            'order' => 1
        ]);

        Structure::create([
            'id' => 2,
            'label' => 'slides',
            'type' => null,
            'id_name' => 'slides',
            'order' => 2
        ]);

        Structure::create([
            'id' => 3,
            'label' => 'product_info',
            'type' => null,
            'id_name' => 'product_info',
            'order' => 3
        ]);

        Structure::create([
            'id' => 4,
            'label' => 'uniq_details',
            'type' => null,
            'id_name' => 'uniq_details',
            'order' => 4
        ]);

        Structure::create([
            'id' => 5,
            'label' => 'history',
            'type' => null,
            'id_name' => 'history',
            'order' => 5
        ]);


        Structure::create([
            'id' => 6,
            'label' => 'testimonials',
            'type' => null,
            'id_name' => 'testimonials',
            'order' => 6
        ]);


        Structure::create([
            'id' => 7,
            'label' => 'about_me',
            'type' => null,
            'id_name' => 'about_me',
            'order' => 7
        ]);


        Structure::create([
            'id' => 8,
            'label' => 'contacts',
            'type' => null,
            'id_name' => 'contacts',
            'order' => 8
        ]);

    }
}
