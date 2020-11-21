<?php

/*
This is the Request class. It gets the current request associated with the server, stores relavent variables, and includes several getter methods for these variables.
*/

class Request {
	// constructor: get server variables and save to class, and split request uri into array of directories
	public function __construct() {
		function endsWith( $haystack, $needle ) {
			$length = strlen( $needle );
			if( !$length ) {
				return true;
			}
			return substr( $haystack, -$length ) === $needle;
		} // from https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php

		// some server vars to save in class (not all of the variables for the class)
		$serverVariablesToSave = array("REQUEST_METHOD", "REQUEST_TIME", "SERVER_NAME", "HTTP_USER_AGENT");
		
		// loop through each server variable to save and store value in class with corresponding key
		foreach($serverVariablesToSave as $variable) {
			$this->$variable = $_SERVER[$variable];
		}

		// useful vars
		$url = ("https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
		$parsed_url = parse_url($url);
		
		// request URI has '/' at the end and does not include query params
		if(endsWith($parsed_url['path'], '/')) {
			$this->REQUEST_URI = $parsed_url['path'];
		} else {
			$this->REQUEST_URI = $parsed_url['path'] . "/";
		}

		// add query params variable to class
		if(array_key_exists('query', $parsed_url)) {
			parse_str($parsed_url['query'], $this->QUERY_PARAMS);
		} else {
			$this->QUERY_PARAMS = [];
		}

		// split URI into directories, and store in variable
		$this->SPLIT_REQUEST_URI = explode("/",$this->getRequestURI());
	}

	// getter methods for variables
	public function getQueryParams() {
		return $this->QUERY_PARAMS;
	}
	public function getRequestURI() {
		return $this->REQUEST_URI;
	}

	public function getRequestMethod() {
		return $this->REQUEST_METHOD;
	}

	public function getRequestTime() {
		return $this->REQUEST_TIME;
	}

	public function getServerName() {
		return $this->SERVER_NAME;
	}

	public function getUserAgent() {
		return $this->HTTP_USER_AGENT;
	}
}

?>