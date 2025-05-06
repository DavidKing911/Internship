<?php
	namespace App\Http\Controllers;
    use App\Models\Post;
    use Posts\Users;
    use Illuminate\Http\Request;
	
	class PostController extends Controller
	{
		public function getPosts()
		{
            $posts = Post::all();
            return view("allPosts", ["posts" => $posts]);
        }

        public function addPost(Request $request)
		{
            $data = $request->validate([
                "name" => ['bail', 'required', 'string', 'max:15'],
                "age" => ['bail', 'required', 'numeric', 'max:99'],
                "gender" => ['bail', 'required', 'string', 'max:10'],
                "post" => ['bail', 'required', 'string', 'max:1000'],
            ]);

            $post = new Post;
            $user = new Users($data['name'], $data['age'], $data['gender'], $data['post']);
            $modelErrors = [];

            if ($user->getValidatedName()) {
                $modelErrors[] = $user->getValidatedName();
            }
            if ($user->getValidatedAge()) {
                $modelErrors[] = $user->getValidatedAge();
            }
            if ($user->getValidatedGender()) {
                $modelErrors[] = $user->getValidatedGender();
            }
            if ($user->getValidatedPost()) {
                $modelErrors[] = $user->getValidatedPost();
            }
            if ($user->ageCheck()) {
                $modelErrors[] = $user->ageCheck();
            }

            if ($modelErrors) {
                return view("formPost", ["modelErrors" => $modelErrors]);
            } else {
                $post->name = $data['name'];
                $post->age = $data['age'];
                $post->gender = $data['gender'];
                $post->post = $data['post'];
                $post->save();
            }
            
            return view("addPost");
        }
	}
?>