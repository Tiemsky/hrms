<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        DB::table('users')->delete();
        $gender = $this->faker->randomElement(['male', 'female']);
        $status = $this->faker->randomElement(['active', 'blocked','deleted']);

        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'position' => $this->faker->text(),
            'employee_id'  => $this->faker->uuid(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'gender'=>$gender,
            'join_date'=> now(),
            'isAdmin'=>rand(0,2),
            'phone'=>$this->faker->phoneNumber,
            'status'=>$status,
            'slug'=>Str::slug($this->faker->name),
            'department_id'=> Department::all()->random()->id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'address' => $this->faker->address,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
