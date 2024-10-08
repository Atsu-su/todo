<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if (! Category::exists()) {
            Category::create(['name' => 'Work']);
            Category::create(['name' => 'Personal']);
            Category::create(['name' => 'Misc']);
        }
        // if (! Todo::exists()) Todo::factory(10)->create();
        Todo::factory(30)->create();
    }
}
