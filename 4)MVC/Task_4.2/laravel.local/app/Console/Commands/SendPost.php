<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Posts\Users;

class SendPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new Users;

        $name = $this->ask('Введите имя');
        $user->setName($name);
        if ($user->getValidatedName()) {
            $this->error($user->getValidatedName());
            return;
        }
        
        $age = intval($this->ask('Введите возраст'));
        $user->setAge($age);
        if ($user->getValidatedAge()) {
            $this->error($user->getValidatedAge());
            return;
        }

        $gender = $this->ask('Введите пол');
        $user->setGender($gender);
        if ($user->getValidatedGender()) {
            $this->error($user->getValidatedGender());
            return;
        }

        $post = $this->ask('Напишите пост');
        $user->setPost($post);
        if ($user->getValidatedPost()) {
            $this->error($user->getValidatedPost());
            return;
        }

        if ($this->confirm('Подтвердите добавления данного поста в базу данных')) {
            if ($user->ageCheck()) {
                $this->error($user->ageCheck());
                return;
            } else {
                $posts = new Post;
                $posts->name = $name;
                $posts->age = $age;
                $posts->gender = $gender;
                $posts->post = $post;
                $posts->save();
                $this->info('Пост успешно добавлен в базу данных!');
            }
        }
    }
}
