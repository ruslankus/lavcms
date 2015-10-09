<?php

use Illuminate\Database\Seeder;
use App\Models\Slides;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->delete();

        Slides::create([
            'id' => 1,
            'struct_id' => 2,
            'img_name' => 'slide-1.jpg',

        ]);

        Slides::create([
            'id' => 2,
            'struct_id' => 2,
            'img_name' => 'slide-2.jpg',

        ]);

        Slides::create([
            'id' => 3,
            'struct_id' => 2,
            'img_name' => 'slide-3.jpg',

        ]);
    }
}
