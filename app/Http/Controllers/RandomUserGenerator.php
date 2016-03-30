<?php

namespace P3\Http\Controllers;

use GuzzleHttp\Client;

class RandomUserGenerator {

	private $client;

	public function __construct() {
		$this -> client = new Client(['base_uri' => 'http://api.randomuser.me', 'http_errors' => false]);
	}

	public function generateRandomUser($type = null) {
		$params = [];

		if (!is_null($type)) {
			$params['gender'] = $type;
		}
		$response = $this -> client -> get('/', ['query' => $params]);
		$body = $response -> getBody();
		$json = json_decode($body, TRUE);
		return $this -> mapUser($json['results'][0]['user']);
	}

	public function generateRandomUsers($num , $country='USA', $gender=null) {
		$params = array();
		
		$params['nat'] = $country;
		$params['gender'] = $gender; 
		$params['results'] = $num;

		$response = $this -> client -> get('/', ['query' => $params]);

		$body = $response -> getBody();
		$json = json_decode($body, TRUE);

		$data = array();
		foreach ($json['results'] as $encUser) {
			$data[] = $this -> loadUserObject($encUser['user'],$country);
		}

		return $data;
	}

	private function loadUserObject($encUser,$country) {
		$user = new RandomUser();
		$user -> setEmail($encUser['email']) -> setTitle($encUser['name']['title']) -> setGender($encUser['gender']) -> setFirstName($encUser['name']['first']) -> setLastName($encUser['name']['last']) -> setStreetAddress($encUser['location']['street']) -> setUsername($encUser['username']) -> setPassword($encUser['password']) -> setDateOfBirth($encUser['dob']) -> setPhone($encUser['phone']) -> setCell($encUser['cell']) -> setPicture($encUser['picture']['large']) -> setThumPicture($encUser['picture']['thumbnail']);
		if (array_key_exists('city', $encUser['location'])) {
			$user -> setCity($encUser['location']['city']);
		} else {
			$user -> setCity('N/A');
		}
		if (array_key_exists('state', $encUser['location'])) {
			$user -> setState($encUser['location']['state']);
		} else {
			$user -> setState('N/A');
		}
		if (array_key_exists('zip', $encUser['location'])) {
			$user -> setZip($encUser['location']['zip']);
		} else {
			$user -> setZip('N/A');
		}
		if (array_key_exists('nationality', $encUser)) {
			$user -> setNationality($encUser['nationality']);
		} else {
			$user -> setNationality($country);
		}

		return $user;
	}

}
