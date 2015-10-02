<?php

use Illuminate\Database\Seeder;
use App\Models\Languages;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('Languages')->delete();

        Languages::create([
            'id' => 1,
            'prefix' => 'en',
            'lang_name' => 'Enlish'
        ]);

        Languages::create([
            'id' => 2,
            'prefix' => 'ru',
            'lang_name' => 'Russian'
        ]);


    }
}
