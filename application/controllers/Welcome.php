<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index() {
    $this->load->view('home_user_input');
	}

	// $this->output->append_output("");
	public function fetch_recommendations() {
		$goodreads_id = $this->input->post("id");

		if (strlen($goodreads_id) === 0) {
			$this->load->view('home_user_input');
			return;
		}

		$url = "https://www.goodreads.com/user/show/" . $goodreads_id . ".xml?key=0zFRvnXyommbgHdQ6NeEQ";
		$xml_api_response = file_get_contents($url);

		// parse the data from $data
		$parsed_response = new SimpleXMLElement($xml_api_response);
		$profile_data = array(
			'name' => $parsed_response->user->name,
			'image' => $parsed_response->user->image_url,
			'joined' => $parsed_response->user->joined,
			'num_books' => $parsed_response->user->reviews_count,
		);

		// These API calls are intentionally kept serial.

		$url2 = "https://www.goodreads.com/review/list?v=2&id=" . $goodreads_id . "&key=0zFRvnXyommbgHdQ6NeEQ&page=1&per_page=200";
		$xml_api_response2 = file_get_contents($url2);

		// // parse the data from $data
		$parsed_response2 = new SimpleXMLElement($xml_api_response2);


		$reviews_data = array();
		foreach ($parsed_response2->reviews->review as $review) {
			if ($review->rating > 0) {
				$review_displayed = array(
					'book_name' => $review->book->title,
					'book_link' => $review->book->link,
					'rating' => $review->rating
				);

				if ($review->book->authors->author[0]->name !== '') {
					$review_displayed['author'] = $review->book->authors->author[0]->name;
					$review_displayed['author_link'] = $review->book->authors->author[0]->link;
				} else {
					$review_displayed['author'] = "unknown";
					$review_displayed['author_link'] = "#";
				}

				array_push($reviews_data, $review_displayed);
			}
		}

		$recommendations_data = "";

		$data = array(
			'profile_data' => $profile_data,
			'reviews_data' => $reviews_data,
			'recommendations_data' => $recommendations_data,
		);

		$this->load->view('user_recommendations', $data);
	}

}
