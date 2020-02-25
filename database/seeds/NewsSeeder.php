<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 10; $i++) {
            $data[] = [
                '_token' => $faker->unique()->word,
                'title' => $faker->realText(rand(20,50)),
                'text' => $faker->realText(rand(1000,2000)),
                'image' => '',
                'slug' => $faker->unique()->word,
                'category_id' => 1
            ];
        }
        return $data;
    }
}
