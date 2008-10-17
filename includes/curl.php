<?php

class CURL {

	var $cookieCache = 'cookies.txt';
	var $userAgent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";

	function doRequest($method, $url, $vars) {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
	    curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookieCache);
	    curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookieCache);

	    if ($method == 'POST') {
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
	    }

	    $data = curl_exec($ch);
	    curl_close($ch);

	    if ($data) {
            return $data;
	    } else {
			return curl_error($ch);
	    }
	}

	function get($url) {
	    return $this->doRequest('GET', $url, 'NULL');
	}

	function post($url, $vars) {
	    return $this->doRequest('POST', $url, $vars);
	}
}

?>
