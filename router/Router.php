<?php

/*
This is the Router class. It utilizes the Request class to
set different routes in the app.
*/

class Router {
	/* class variable for array of URIs and methods */
	public $routedURIs = array();

	/* constructor, which takes in the Request object and supported methods array, and stores in class */
	public function __construct($requestObj, $supportedMethods) {
		// set class variables to variables passed to constructor
		$this->requestObj = $requestObj;
		$this->supportedMethods = $supportedMethods;
	}

	/* this is the error handler, which handles errors, such as page_not_found, and method_not_allowed. It should always be defined (called) after all other routes have been defined. */
	public function error($name, $function) {
		// switch case for error codes
		switch ($name) {
			case "method_not_allowed":
				// if method is indeed not allowed, run function and set 405 header
				if(!in_array($this->requestObj->getRequestMethod(), $this->supportedMethods)) {
					http_response_code(405);
					$function();
				}
				break;
			case "page_not_found":
				// if page is indeed not in routedURIs, run function and set 404 header
				if(!in_array($this->requestObj->getRequestMethod() . ": " . $this->requestObj->getRequestURI(), $this->routedURIs)) {
					http_response_code(404);
					$function();
				}
				break;
			case "is_using_ie":
				if (strpos($this->requestObj->getUserAgent(), "MSIE") !== false) {
					$function();
				}
		}
	}

	/* this is the magic __call function. It will process any calls for any supported methods; e.g. Router->get(function(){}), or Router->post(function(){}) */
	public function __call($name, $arguments) {
		// if name is a supported method, process
		if(in_array(strtoupper($name), $this->supportedMethods)) {
			// if method is the current requests method, process
			if(strtoupper($name) == $this->requestObj->getRequestMethod()) {
				// if passed target URI is equal to current URI, then run passed function, and add URI and method to $routedURIs variable
				if($arguments[0] == $this->requestObj->getRequestURI()) {
					$arguments[1]();
				}
				array_push($this->routedURIs, (strtoupper($name) . ": " . $arguments[0]));
			}
		}
	}
}

?>