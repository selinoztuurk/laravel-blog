<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
//         \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            // password
        ]);

        $cli = new ConsoleOutput();
        $categories = Category::factory(20)->create();
        $posts = Post::factory(rand(50, 100))->withAuthor($user)->create();
        $progress = new ProgressBar($cli);
        $progress->start();
        foreach ($posts as $post) {
            $post->categories()->sync($categories->shuffle()->take(rand(1, 5))->pluck('id')->toArray());
            $progress->advance();
        }
        $progress->finish();
    }

}
