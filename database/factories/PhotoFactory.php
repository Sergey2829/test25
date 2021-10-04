<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $files = glob(public_path('images').'/*jpg');
        $randomFileId = array_rand($files);
        return [
            'title' => $this->faker->sentence(rand(1, 2)),
            'url' =>  basename($files[$randomFileId])
        ];
    }
}
