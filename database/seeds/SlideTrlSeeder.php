<?php

use Illuminate\Database\Seeder;
use App\Models\SlideTrl;

class SlideTrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slide_trls')->delete();

        SlideTrl::create([
            'slide_id' => 1,
            'lng_id' => 1,
            'slide_alt' => 'Slide alt 1',
            'slide_html' => '<h4>Slide html 1</h4>'
        ]);

        SlideTrl::create([
            'slide_id' => 1,
            'lng_id' => 2,
            'slide_alt' => 'Слайд 1',
            'slide_html' => '<h4>Слайд html 1</h4>'
        ]);

        SlideTrl::create([
            'slide_id' => 2,
            'lng_id' => 1,
            'slide_alt' => 'Slide alt 2',
            'slide_html' => '<h4>Slide html 2</h4>'
        ]);

        SlideTrl::create([
            'slide_id' => 2,
            'lng_id' => 2,
            'slide_alt' => 'Слайд 2',
            'slide_html' => '<h4>Слайд html 2</h4>'
        ]);

        SlideTrl::create([
            'slide_id' => 3,
            'lng_id' => 1,
            'slide_alt' => 'Slide alt 3',
            'slide_html' => '<h4>Slide html 3</h4>'
        ]);

        SlideTrl::create([
            'slide_id' => 3,
            'lng_id' => 2,
            'slide_alt' => 'Слайд 3',
            'slide_html' => '<h4>Слайд html 3</h4>'
        ]);
    }
}
