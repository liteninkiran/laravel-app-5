<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        //$this->$faker->addProvider(new \Faker\Provider\en_GB\Person($this->$faker));
        //$this->$faker->addProvider(new \Faker\Provider\en_GB\Address($this->$faker));
        return
        [
            'company_name'      => $this->faker->company,
            'address_line_1'    => $this->faker->streetAddress,
            'address_line_4'    => $this->faker->city,
            'address_line_5'    => $this->faker->county,
            'post_code'         => $this->faker->postcode,
            'phone'             => $this->faker->phoneNumber,
            'url'               => $this->faker->url,
            'user_id'           => '1'
        ];
    }

}
