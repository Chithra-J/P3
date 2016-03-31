<?php

namespace P3\Http\Controllers;

use joshtronic\LoremIpsum;

class LoremIpsumGenerator {
	private $lipsum;

	public function __construct() {
		$this -> lipsum = new LoremIpsum();
	}
	
	/*
	 * Get paragraph as array 
	*/
	public function getParagraphs($num, $tags = false) {
		return $this -> lipsum -> paragraphs($num, $tags, true);
	}
	/*
	 * Get sentences as array 
	*/
	public function getSentence($num, $tags = false) {
		return $this -> lipsum -> sentences($num, $tags, true);
	}
	/*
	 * Get words as array 
	*/
	public function getWords($num, $tags = false) {
		$random_words = $this -> lipsum -> words($num + 200, $tags, true);
		shuffle($random_words);
		return array_slice($random_words, 0, $num);
	}

}
?>