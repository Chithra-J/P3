<?php

namespace P3\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P3\Http\Controllers\Controller;
use P3\Http\Controllers\RandomUserGenerator;
use P3\Http\Controllers\User;
use Illuminate\Http\Request;

class P3RandomUserController extends Controller {

	/**
	 * Responds to requests to GET /P3/user-generator
	 */
	public function getRandomUsers() {
		return view('users.getuserdetails');
	}
	
	/**
	 * Responds to requests to POST /P3/user-generator
	 */
	public function postRandomUsers(Request $request) {
		$this -> validate($request, ['number_of_users' => 'required|numeric|min:2|max:50', ]);
		$data = $request -> all();
		$gen = new RandomUserGenerator();
		$users = $gen -> generateRandomUsers($data['number_of_users'],$data['optionsCountry'],isset($data['optionsGender'])?$data['optionsGender']:null);
		return view('users.show', array('users' => $users));

	}

}
