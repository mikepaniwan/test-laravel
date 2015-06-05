<?php namespace App\Http\Controllers;

use Request;

class UserController extends Controller {

	public function showForm() {
		return view('user.fill');
	}

	public function showName() {

		$data = Request::all();

		$name = $data['name'];
		$job = $data['job'];

		return view('user.index')
				->with('name',$name)
				->with('job',$job);
		
	}

}
