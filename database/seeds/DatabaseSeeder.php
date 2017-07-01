<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Users::class);
        factory(Boye\User::class, 50)->create();
        factory(Boye\Category::class, 20)->create();
        factory(Boye\Post::class, 200)->create();
        factory(Boye\Comment::class, 20)->create();
        factory(Boye\Visitor::class, 1000)->create();
         $this->call(Setting::class);
    }
}
