<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ability;
use App\Models\Car;
use App\Models\Donation;
use App\Models\Ride;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'admin',
            'description' => 'some description',
        ]);
        Role::create([
            'name' => 'user',
            'description' => 'user',
        ]);

        Role::create([
            'name' => 'driver',
            'description' => 'drives the users',
        ]);

        $ability = Ability::create([
            'action' => 'create-driver',
            'model_name' => User::class,
        ]);

        $this->call(CharitySeeder::class);

        $role->abilities()->attach($ability);

        $user = User::factory()->create([
            'email' => 'admin@test.com',
        ]);

        $user->role_id = 1;
        $user->save();

        User::factory(10)->create();
        Car::factory(10)->create();
        Donation::factory(10)->create();

        Ride::factory(20)->create();
    }
}
