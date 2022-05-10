<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            "id" => Uuid::uuid4(),
            "name" => "Administrator",
            "email" => "admin@example.com",
            "password" => Bcrypt("password"),
        ]);

        $user->save();
    }
}
