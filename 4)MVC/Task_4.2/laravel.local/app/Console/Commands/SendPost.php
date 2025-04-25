<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use src\User;

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
        $name = $this->ask('Введите имя');
        if (strlen($name) > 20 || empty($name)) {
            $this->error('Имя должно содержать не более 20 символов');
            return;
        }
        
        $age = intval($this->ask('Введите возраст'));
        if (!filter_var($age, FILTER_VALIDATE_INT)) {
            $this->error('Поле возраста не может быть пустым');
            return;
        } else if (strlen($age) > 2 || empty($age)) {
            $this->error('Возраст должен быть только двузначным числом');
            return;
        }

        $gender = $this->ask('Введите пол');
        if (strlen($gender) > 15 || empty($gender)) {
            $this->error('Пол должен быть не больше 10 символов');
            return;
        }

        $post = $this->ask('Напишите пост');
        if (strlen($post) > 1000 || empty($post)) {
            $this->error('Пост не должен быть больше 1000 символов');
            return;
        }

        if ($this->confirm('Подтвердите добавления данного поста в базу данных')) {
            if ($age < 10 && (strtolower($gender) == "мужской" || strtolower($gender) == "male")) {
                $this->error('Пользователь мужского пола младше 10 лет добавить пост не может!');
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
