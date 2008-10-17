<?

class Meetup extends Browser{

	var $Site = array(
			'name' => 'Meetup.com',
			'url'=>'http://meetup.com',
			'organizer_id'=>'1144980',
			'key'=>'6a4632392a15622d354b621a3b774833',
			'loginurl' => 'http://www.meetup.com/login/',
			'loginparams' => 'email=virgill41@hotmail.com&password=Quake3&rememberme=on&submitButton=Sign%20in&returnUri=http://www.meetup.com/&op=login'
		);
	
	var $groups;
	
	var $members =  array(
		'0'=>array(
			'member_id'=>'1144980',
			'member_name'=>'Paul Kruger',
			'guests'=>'20',
			'member_comment'=>'Looking foward to this event.. Call me if you need directions 561 213 3854 - Paul  Need a Job? Apply Now http://miamiwebjobs.com'
		),
		'1'=>array(
			'member_id'=>'1062585',
			'member_name'=>'Onajide',
			'member_comment'=>'Always looking to learn and help out... http://miamiartexchange.com'
		)
		
	);
	
	var $useCache = 0;
	var $rsvp_myevents_only = 1;
	
	function __construct(){
	
		parent::__construct();

		$this->login($this->Site['loginurl'],$this->Site['loginparams']);

	}


//	function scheduleMeetup($pageLoadUniqueId, $date, $hour, $venue, $group){
	function scheduleMeetup(){

		$event = array( 
			'0' => array(
				'Event' => array(
					'title'=>'This is the title',
					'description'=>'This is the description of the event',
					'group'=>'http://fsf.meetup.com/28/',
					'calurl'=>'calender/',
					'pageLoadUniqueId' => '1224034968805',
					'venueid' => '37099',
					'datetime' => array(
						'month' => '10',
						'day' => '28',
						'year' => '2008',
						'hour' => '7',
						'minute' => '30',
						'ampm' => 'pm'
					)
				)
			)
		);


$event = $event['0']['Event'];
$url = $event['group'] . $event['calurl'] . '?';

$event['submitnext'] = urlencode('Schedule Meetup');



$params = 

    'token=12240349688310.8875644703921295'.
	'&pageLoadUniqueId=' . $event['pageLoadUniqueId'] .
    '&origId=665694'.

	'&title='. urlencode($event['title']) . 
    '&venueId='. $event['venueid'] .
    '&hostIdentifyBlurb='.urlencode($event['howtofind']).
    '&description=' . $details.

    '&event_month=' . $event['datetime']['month'] .
    '&event_day=28'. $event['datetime']['day'] .
    '&event_year=2008'. $event['datetime']['year'] .
    '&event_hour12=7'. $event['datetime']['hour'] .

    '&event_minute=0'. $event['datetime']['minute'] .
    '&event_ampm='. $event['datetime']['ampm'] .

    '&event_second=0'.
    
    '&todayYear=2008'.
    '&todayMonth=10'.


    '&search_log_id='.
    '&search_rank='.
    '&search_sort='.
    '&search_desc='.
    
    '&VP_name_default=Place Name'.
    '&VP_address1_default=Street address or intersection'.
    '&VP_address2_default=Apt., suite, floor number, etc.'.
    '&VP_city_default=City name'.
    '&VP_zip_default=Optional if city/state is provided'.
    '&VP_phone_default=Place\'s phone number'.
    '&VP_web_default=http://www.venue.com'.
    '&VP_hours_default=Place\'s hours of operation'.
    '&VP_tag_default=Ex: backroom, extra seating, quiet'.

    '&hide_location=1'.
    '&hostIdentifyBlurb_default=Ex: I\'ll be the guy in the back with a Meetup t-shirt'.

    '&photoId=4917897'.

    '&photo_prefs=show'.
    '&host_1144980=on'.
    '&payment_method='.
    '&use_paypal=0'.
    '&fee_label=Price'.
    '&fee_currency=USD'.
    '&fee=20.00'.
    '&fee_desc=per person'.
    '&fee_mode=0'.
    '&refund_none_yes=0'.
    '&refund_member_cancellation_days=0'.
    '&refund_policy='.
    '&rsvp_limit_number=20'.
    '&rsvp_limit=0'.
    '&rsvpCutoffTime_month=10'.
    '&rsvpCutoffTime_day=26'.
    '&rsvpCutoffTime_year=2008'.
    '&rsvpCutoffTime_hour12=7'.
    '&rsvpCutoffTime_minute=0'.
    '&rsvpCutoffTime_ampm=1'.
    '&rsvpCutoffTime_second=0'.
    '&allowMaybeRsvps=on'.
    '&guestLimitCheck=on'.
    '&guestLimit=10'.
    '&notifyNewRsvp=on'.
    '&notifyNewComment=on'.
    '&emailReminders=on'.
    '&rsvp=1'.
    '&pre_event_survey_question_1='.
    '&numQuestions=1'.
    '&eventId='.
    '&copyName='.
    '&addFlow='.
    '&newgrp='.
    '&firstgrp='.
    '&eventAction=adding'.
    '&action_cancel=cancelchange'.
    '&action_next=publish'.
    '&returnUri=?action=new_item'.
    '&submit=submit'.
    '&submit_next='. $event['submitnext'] 
	;
	
echo $url . $params. '

';
die();	
	
	}


//	function inviteMembers($members, $subject, $body){
	function inviteMembers(){

		$subject = 'Meetup Invite';
		$body = 'Welcome to meetup, I thought you might be interested in joining our web developer meetup http://fsf.meetup.com/28/';
	
		$members = array('1144980');

		foreach($members as $member){

			$url = 'http://www.meetup.com/message/?recipientId='. $member;
			$params = 
				'&subject=' . urlencode($subject) .
				'&body='. urlencode($body) . 
				'&ccMember=on' .
				'&anon=1' .
				'&wl=1' .
				'&recipientId=' . $member .
				'&op=member' .
				'&overrideEmailLimits=' .
				'&submit=Send'
			;

		echo $url . $params . '

';
		
		
		}
			
		die();
	
	}

	function getxmlarray($url){

		$cache = $this->cache . '/'.urlencode($url).'.txt';

		if(file_exists($cache) && $this->useCache == 1){

			$xmlObj = File::readFile($cache);

		} else {

			$xml = $this->get($url);
			File::saveFile($cache, $xml);
		
		}

		$xmlObj    = new XmlToArray($xml);
		$array = $xmlObj->createArray();
		if(isset($array['results']['items']['0']['item'])){
			
			$array = $array['results']['items']['0']['item'];
		}

		

		return $array; 

	}

	function getGroups(){

		$groupsurl = 'http://api.meetup.com/groups.xml/?key=' . $this->Site['key'] . '&member_id=' . $this->Site['organizer_id'];
		$this->groups = $this->getxmlarray($groupsurl);
	}

	function rsvpAllEvents(){

		foreach ($this->groups as $group){

			foreach ($group['events'] as $event){
			
				foreach($this->members as $member){
					
					//only rsvp for events I organize
					
					pr($group);
					
					if($this->rsvp_myevents_only == 1){
						$this->rsvp($event['id'],array($member['id']),'yes',$member['guests'],$member['comment']);					
					
					}
					
				}
			}
		}
	}

	function rsvp($event_id, $members, $rsvp, $guests, $comments){
		$comments = urlencode($comments);
		
		foreach ($members as $member){
			$rsvpurl = 'http://api.meetup.com/rsvp.xml/?key=' . $this->Site['key'] . '&event_id='.$event_id.'&rsvp='.$rsvp.'&member_id='.$member.'&comments='.$comments;
			$this->lastresults[] = $this->getxmlarray($rsvpurl);
		}		
	}

	function getEvents(){
		foreach($this->groups as & $group){

			$group['eventsurl'] = 'http://api.meetup.com/events.xml/?key='.$this->Site['key'] . '&group_id='. $group['id'];

			$group['events'] = $this->getxmlarray($group['eventsurl']);

		}
	}

	function getMembers(){

	}
}

?>
