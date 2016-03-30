<?php

namespace P3\Http\Controllers;

class RandomUser {


	const MALE = 'male';
	const FEMALE = 'female';

	private $gender;
	private $title;
	private $firstName;
	private $lastName;
	private $streetAddress;
	private $city;
	private $state;
	private $zip;
	private $email;
	private $username;
	private $password;
	private $dob;
	private $phone;
	private $cell;
	private $picture;
	private $thum_picture;
	private $nationality;

	public function getGender() {
		return $this->gender;
	}
	public function getTitle() {
		return $this->title;
	}
	public function getName() {
		return $this->firstName.' '.$this->lastName;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function getStreetAddress() {
		return $this->streetAddress;
	}
	public function getCity() {
		return $this->city;
	}
	public function getState() {
		return $this->state;
	}
	public function getZip() {
		return $this->zip;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getUsername() {
		return $this->username;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getDateOfBirth() {
		return $this->dob;
	}
	public function getPhone() {
		return $this->phone;
	}
	public function getCell() {
		return $this->cell;
	}
	public function getPicture() {
		return $this->picture;
	}
	public function getThumPicture() {
		return $this->thum_picture;
	}
	public function getNationality() {
		return $this->nationality;
	}
	
	public function setGender($gender) {
		$this->gender = $gender;
		return $this;
	}
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}
	public function setStreetAddress($streetAddress) {
		$this->streetAddress = $streetAddress;
		return $this;
	}
	public function setCity($city) {
		$this->city = $city;
		return $this;
	}
	public function setState($state) {
		$this->state = $state;
		return $this;
	}
	public function setZip($zip) {
		$this->zip = $zip;
		return $this;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function setDateOfBirth($dob) {
		$this->dob = $dob;
		return $this;
	}
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}
	public function setCell($cell) {
		$this->cell = $cell;
		return $this;
	}
	public function setPicture($picture) {
		$this->picture = $picture;
		return $this;
	}
	public function setThumPicture($thum_picture) {
		$this->thum_picture = $thum_picture;
		return $this;
	}
	public function setNationality($nationality) {
		$this->nationality = $nationality;
		return $this;
	}
}