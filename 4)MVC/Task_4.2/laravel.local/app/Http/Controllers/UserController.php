<?php
	namespace App\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	
	class UserController extends Controller
	{
		public function show()
		{
			$migrs = DB::table('migrations')->get();
			return view('user', ['migrs' => $migrs]);
		}
	}
?>