<?php
	namespace App\Http\Controllers;
    use App\Models\Post;
    use Illuminate\Http\Request;
	
	class PostController extends Controller
	{
		public function getPosts()
		{
            $posts = Post::all();
            return view("allPosts", ["posts" => $posts]);
        }

        public function showResponseAdd(Request $request)
		{
            $post = new Post;
            $data = $request->all();

            $post->name = $data['name'];
            $post->age = $data['age'];;
            $post->gender = $data['gender'];;
            $post->post = $data['post'];;
            
            $post->save();
            return view("responseAddPost");
        }
	}
?>