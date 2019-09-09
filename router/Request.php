<?php

/*
This is the Request class. It gets the current request associated with the server, stores relavent variables, and includes several getter methods for these variables.
*/

class Request {
	// constructor: get server variables and save to class, and split request uri into array of directories
	public function __construct() {
		// variable for server vars to save in class
		$serverVariablesToSave = array("REQUEST_URI", "REQUEST_METHOD", "REQUEST_TIME", "SERVER_NAME");
		
		// loop through each server variable to save and store value in class with corresponding key
		foreach($serverVariablesToSave as $variable) {
			$this->$variable = $_SERVER[$variable];
		}

		// split URI into directories, and store in variable
		$this->$SPLIT_REQUEST_URI = explode("/",$this->getRequestURI());
	}

	// getter methods for variables
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
}

?>