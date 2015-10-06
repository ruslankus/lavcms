<?php

use Illuminate\Database\Seeder;
use App\Models\StructTrl;

class StructTrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('struct_trls')->delete();

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 1,
            'trl' => 'Home'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 1,
            'trl' => 'Главная'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 2,
            'trl' => 'Slides'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 2,
            'trl' => 'Слайдер'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 3,
            'trl' => 'Products'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 3,
            'trl' => 'Продукты'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 4,
            'trl' => 'Uniq detail'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 4,
            'trl' => 'Уникальные фишки'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 5,
            'trl' => 'History'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 5,
            'trl' => 'История'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 6,
            'trl' => 'Home'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 6,
            'trl' => 'Отзывы'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 7,
            'trl' => 'About me'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 7,
            'trl' => 'Обо мне'
        ]);

        StructTrl::create([
            'lng_id' => 1,
            'struct_id' => 8,
            'trl' => 'Contacts'
        ]);

        StructTrl::create([
            'lng_id' => 2,
            'struct_id' => 8,
            'trl' => 'Контакты'
        ]);



    }
}
