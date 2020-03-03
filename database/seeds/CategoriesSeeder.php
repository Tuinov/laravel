<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\factory(Categories::class, 10)->create();
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->realText(rand(20,50)),
                'slug' => $faker->unique()->word,
            ];
        }
        return $data;
    }
}
