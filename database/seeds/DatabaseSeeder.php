<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(StructSeeder::class);
        $this->call(StructTrlSeeder::class);
        $this->call(SlidesSeeder::class);
        $this->call( SlideTrlSeeder::class);

        Model::reguard();
    }
}
