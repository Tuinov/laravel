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
                'title' => $faker->realText(rand(20,30)),
                'text' => $faker->realText(rand(1000,2000)),
                'image' => '',
                'slug' => $faker->unique()->word,
                'category_id' => (rand(1,10)),
                'user_id' => (rand(1,5)),
//                'category_id' => function() {
//                return factory(App\Categories::class)->create()->id;
//                },
            ];
        }
        return $data;
    }
}
