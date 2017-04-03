<?php
//require '\fzaninotto\faker\src\autoload.php';
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use Faker\Factory as Faker;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0;$i<50; $i++){
            dd($faker->name);
            DB::table('product')->insert([
                'name' => $faker->name,
                'slag' => $faker->url,
                'price' => $faker->numberBetween($min = 1000, $max = 9000),
                'description'=> $faker->text,
                'images'=> $faker->imageUrl($width = 640, $height = 480),
                'sort'=> $faker->numberBetween($min = 1, $max = 500),
                'active'=> true,
                'currency' => 'UAH',
                'category_id'=> $faker->numberBetween($min = 1, $max = 50),
                ]);
        }

    }
}
