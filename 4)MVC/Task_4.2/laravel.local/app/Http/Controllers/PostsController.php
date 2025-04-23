<?php
	namespace App\Http\Controllers;
    use Illuminate\Support\Facades\DB;
	
	class PostsController extends Controller
	{
		public function getPosts()
		{
            $posts = DB::table('posts')->get();
            return view("allPosts", ["posts" => $posts]);
        }

        public function showResponseAdd()
		{
            DB::table("posts")->insert([
                'name' => $_GET['name'],
                'age' => $_GET['age'],
                'gender' => $_GET['gender'],
                'post' => $_GET['post'],
            ]);
            return view("responseAddPost");
        }
	}
?>