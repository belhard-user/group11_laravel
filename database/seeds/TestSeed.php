<?php

use Illuminate\Database\Seeder;

class TestSeed extends Seeder
{
    private $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('test');

        $db->truncate();

        for($i = 0; $i < 100; $i++){
            $db->insert([
                'name' => $this->faker->firstName,
                'age' => $this->faker->numberBetween(18, 65),
                'email' => $this->faker->email,
                'created_at' => $this->faker->dateTimeBetween('-15 year', '+2 year'),
                'updated_at' => $this->faker->dateTimeBetween('-15 year', '+2 year')
            ]);
        }
    }
}
