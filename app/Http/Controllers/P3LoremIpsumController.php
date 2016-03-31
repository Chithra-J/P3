<?php

namespace P3\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use P3\Http\Controllers\Controller;
use P3\Http\Controllers\LoremIpsumGenerator;
use Illuminate\Http\Request;

class P3LoremIpsumController extends Controller {

	/**
	 * Responds to requests to GET /P3
	 */
	public function getIndex() {
		return view('loremipsum.index');
	}

	/**
	 * Responds to requests to GET /P3/lorem-ipsum
	 */
	public function getLoremIpsum() {
		return view('loremipsum.getloremipsumdetails');
	}

	/**
	 * Responds to requests to POST /P3/lorem-ipsum
	 */
	public function postLoremIpsum(Request $request) {

		$html_tags = array();
		$this -> validate($request, ['number_of_random_text' => 'required|numeric|min:2|max:100', 'lorem_ipsum_option' => 'required', ]);
		$data = $request -> all();
		$number_of_text = $data['number_of_random_text'];
		$html_tags[0] = isset($data['para']) ? $data['para'] : null;
		$html_tags[1] = isset($data['bold']) ? $data['bold'] : null;
		$html_tags[2] = isset($data['head']) ? $data['head'] : null;
		$html_tags[3] = isset($data['italic']) ? $data['italic'] : null;
		$html_tags[4] = isset($data['link']) ? $data['link'] : null;
		$html_tags[5] = isset($data['underline']) ? $data['underline'] : null;

		$html_tags = array_filter($html_tags, function($tag) {
			return $tag !== null;
		});
		$random_text = $this -> callLoremIpsumWithTags($data['lorem_ipsum_option'], $number_of_text, $html_tags);

		return view('loremipsum.show') -> with('random_text', $random_text); ;

	}

	/**
	 * Method to call appropriate function with html tags
	 */

	public function callLoremIpsumWithTags($lorem_ipsum_option, $number_of_text, $html_tags) {
		$random_text = array();
		$num_of_tags = count($html_tags);
		$html_tag_quo = 0;
		$html_tag_mod = 0;
		/*
		 Logic to separate out the list of text that need html tags equally divide and the remainder gets regular text
		 */
		if ($num_of_tags > 0 && $num_of_tags >= $number_of_text) {
			$html_tag_quo = floor($number_of_text / $num_of_tags);
			$html_tag_mod = $number_of_text % $num_of_tags;
		} else if ($num_of_tags > 0 && $num_of_tags < $number_of_text) {
			$html_tag_quo = $number_of_text;
		} else {
			$html_tag_mod = $number_of_text;
		}

		$random_text = $this -> generateLoremIpsumWithTags($lorem_ipsum_option, $html_tag_mod, $html_tag_quo, $html_tags, $num_of_tags);
		return $random_text;
	}

	/**
	 * Method to genrate appropriate function with html tags
	 */

	public function generateLoremIpsumWithTags($lorem_ipsum_option, $remaining_text, $batch_text, $html_tags, $num_of_tags) {
		$temp_random_text = array();
		$random_text = array();
		$keys = array_keys($html_tags);
		$lorem_ipsum = new LoremIpsumGenerator();

		switch ($lorem_ipsum_option) {
			case "Paragraphs" :
				if ($remaining_text > 0) {
					$temp_random_text = $lorem_ipsum -> getParagraphs($remaining_text);
				}
				if ($batch_text > 0) {
					for ($i = 0; $i < $num_of_tags; $i++) {
						$temp_random_text = array_merge($lorem_ipsum -> getParagraphs($batch_text, $html_tags[$keys[$i]]), $temp_random_text);
					}

				}
				break;
			case "Words" :
				if ($remaining_text > 0) {
					$temp_random_text = $lorem_ipsum -> getWords($remaining_text);
				}
				if ($batch_text > 0) {
					for ($i = 0; $i < $num_of_tags; $i++) {
						$temp_random_text = array_merge($lorem_ipsum -> getWords($batch_text, $html_tags[$keys[$i]]), $temp_random_text);
					}

				}
				break;
			case "Sentences" :
				if ($remaining_text > 0) {
					$temp_random_text = $lorem_ipsum -> getSentence($remaining_text);
				}
				if ($batch_text > 0) {
					for ($i = 0; $i < $num_of_tags; $i++) {
						$temp_random_text = array_merge($lorem_ipsum -> getSentence($batch_text, $html_tags[$keys[$i]]), $temp_random_text);
					}

				}
				break;

			default :
				$random_text = $lorem_ipsum -> getParagraphs($batch_text);
				if ($remaining_text > 0) {
					$temp_random_text = $lorem_ipsum -> getParagraphs($remaining_text);
				}
				if ($batch_text > 0) {
					for ($i = 0; $i < $num_of_tags; $i++) {
						$temp_random_text = array_merge($lorem_ipsum -> getParagraphs($batch_text, $html_tags[$keys[$i]]), $temp_random_text);
					}

				}
		}
		if ($batch_text > 0) {
			shuffle($temp_random_text);
		}
		return $temp_random_text;
	}

}
