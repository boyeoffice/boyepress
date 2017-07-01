<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Boye\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'confirm_code'   => str_random(64),
        'avatar' => 'avatars/default.png',
        'status' => false,
        'username' => $faker->unique()->word,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Boye\Category::class, function (Faker\Generator $faker) {
    return [
        'title'      => $faker->name,
        'slug' 		=> $faker->unique()->word
    ];
});

$factory->define(Boye\Post::class, function (Faker\Generator $faker) {
    $user_ids = \Boye\User::pluck('id')->random();
    $category_ids = \Boye\Category::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3,10));
    return [
        'user_id'      => $user_ids,
        'category_id'  => $category_ids,
        'slug'     => str_slug($title),
        'title'    => $title,
        'content'  => $faker->paragraph,
        'tags'     => $faker->word,
        'image'       => 'content/default.png',
        'meta_description' => $faker->sentence,
        'status'         => true,
        'published_at'     => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});

$factory->define(Boye\Comment::class, function (Faker\Generator $faker) {
    $user_ids = \Boye\User::pluck('id')->random();
    $post_ids = \Boye\Post::pluck('id')->random();
    $type = ['discussions', 'articles'];
    return [
        'user_id'             => $user_ids,
        'commentable_type'    => $type[mt_rand(0, 1)],
        'commentable_id'      => $post_ids,
        'content'             => $faker->paragraph
    ];
});

$factory->define(Boye\Visitor::class, function (Faker\Generator $faker) {
    $post_id = \Boye\Post::pluck('id')->random();
    $num = $faker->numberBetween(1, 100);

    $post = Boye\Post::find($post_id);
    $post->view_count = $num;
    $post->save();

    return [
        'post_id' => $post_id,
        'ip'         => $faker->ipv4,
        'country'    => 'NG',
        'clicks'     => $num
    ];
});
