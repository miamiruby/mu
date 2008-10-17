<?php

	include_once 'config.php';

	include_once $includes . 'curl.php';
	include_once $includes . 'functions.php';
	include_once $includes . 'xml.php';
	include_once $includes . 'browser.php';
	include_once $includes . 'file.php';
	include_once $includes . 'mydirectory.php';

	include_once $includes . 'meetup.php';


	$meetup = new Meetup();

	$meetup->getGroups();
	$meetup->getEvents();
	$meetup->rsvpAllEvents();

	//$meetup->inviteMembers();
	
		$meetup->scheduleMeetup();
	
	
	//pr($meetup);	

die();
	
	$return = $browser->post($url, $vars);
	echo $return;

	$url2 = 'http://www.meetup.com/';
	$page = $browser->get($url2);
	File::saveFile('page.html');


?>
