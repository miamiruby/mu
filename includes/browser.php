<?php

ini_set('max_execution_time', '0');
ini_set('default_socket_timeout',    400);

class Browser extends Curl{

	var $cache = 'cache';
	
	function __construct(){

		$this->cookieCache = $this->cache . '/' . $this->cookieCache;

	}

	function login($url, $params){

		$this->doRequest('POST', $url, $parmas);

	}
	
}

?>