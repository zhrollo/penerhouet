<?php
// google-api.php : classe GoogleApi

class GoogleApi
{
	/*
	Utilisation de proxy
	@param $ch ???
	*/
	public function proxy($ch) {
		//proxy support
		if (_PROXY=='1') {
			curl_setopt($ch, CURLOPT_PROXY, _PROXY_URL);
			curl_setopt($ch, CURLOPT_PROXYPORT, _PROXY_PORT);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, _PROXY_USERPWD);
			curl_setopt($ch, CURLOPT_PROXYTYPE, _PROXY_TYPE);
			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
		}
	}
	
	/*
	Récupérer l'access token
	@param $client_id
	@param $redirect_uri
	@param $client_secret
	@param $code
	*/	
	public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
		$url = 'https://accounts.google.com/o/oauth2/token';			
		
		$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';

		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);	
		
		GoogleApi::proxy($ch);
		
		$data = json_decode(curl_exec($ch), true);
		
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		
		if ($http_code != 200) {
			throw new Exception($http_code.' - Error : Failed to receive access token');
		}
			
		return $data;
	}

	/*
	Récupérer la time zone
	@param $access_token token
	*/	
	public function GetUserCalendarTimezone($access_token) {
		$url_settings = 'https://www.googleapis.com/calendar/v3/users/me/settings/timezone';
	
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_settings);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	
		
		GoogleApi::proxy($ch);

		
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if ($http_code != 200) {
			throw new Exception('Error : Failed to get timezone');
		}

		return $data['value'];
	}
	
	/*
	Récupérer la liste des calendriers
	@param $access_token token
	*/	
	public function GetCalendarList($access_token) {
		$url_settings = 'https://www.googleapis.com/calendar/v3/users/me/calendarList';
		
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_settings);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		
		GoogleApi::proxy($ch);
		
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if ($http_code != 200) {
			throw new Exception('Error : Failed to get calendar list');
		}
		return $data;		
	}

	/*
	Récupérer la liste des événements gCalendar
	@param $calendar_id l'identifiant du calendrier
	@param $access_token token
	*/
	public function GetEventList($calendar_id, $access_token) {
		$url_settings = 'https://www.googleapis.com/calendar/v3/calendars/'.$calendar_id.'/events?singleEvents=true&orderBy=startTime';
		
		// echo "<li>".$url_settings;
		// echo "<li>Authorization: Bearer ". $access_token;
		
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_settings);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		
		GoogleApi::proxy($ch);
		
		$json_data = curl_exec($ch);
		$data = json_decode($json_data, true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
		if ($http_code != 200) {
			throw new Exception('Failed to get event list. Erreur '.$http_code);
		}
		return $data;		
	}
	
	/*
	Récupérer un événement gCalendar
	@param $calendar_id l'identifiant du calendrier
	@param $event_id l'identifiant de l'événement
	@param $access_token token
	*/	
	public function GetEvent($calendar_id, $event_id, $access_token) {
		$url_settings = 'https://www.googleapis.com/calendar/v3/calendars/'.$calendar_id.'/events/'.$event_id;
		echo $url_settings;
		
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_settings);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		
		GoogleApi::proxy($ch);
		
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if ($http_code != 200) {
			throw new Exception('Error : Failed to get event');
		}
		
		return $data;		
	}
	
	/*
	Supprimer un événement gCalendar
	@param $event_id l'identifiant de l'événement
	@param $calendar_id l'identifiant du calendrier
	@param $access_token token
	*/
	public function DeleteCalendarEvent($event_id, $calendar_id, $access_token) {
        $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events/' . $event_id.'?sendNotification=true';

        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url_events);     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json'));
		
		GoogleApi::proxy($ch);
		
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        if ($http_code != 204) {
            throw new Exception('Error : Failed to delete event');
		}
    }
	
    /**
     * Method to create an event in a specific calendar.
     * @param string $calendar_id		identification calendrier
	 * @param $title
	 * @param $location
	 * @param $details
	 * @param $start
	 * @param $end
	 * @param $access_token
     * @return bool|object            Returns false on failure and object on success
     */
    public function createEvent($calendar_id, $title, $location, $details, $start, $end, $access_token) {

		
		//API Url
		$url = sprintf('https://www.googleapis.com/calendar/v3/calendars/%s/events',$calendar_id);

		//The JSON data.
		$data = sprintf('{
			"summary": "%s",
			"location": "%s",
			"description": "%s",
			"start": {
				"dateTime":"%s", 
				"timeZone":"Europe/Paris"
			},
			"end": {
				"dateTime":"%s", 
				"timeZone":"Europe/Paris"
			},
			"reminders": {
				"useDefault": "false",
				"overrides": [
					{
						"method": "email",
						"minutes": 20160
					},
					{
						"method": "sms",
						"minutes": 20160
					}
				]
			}
		}', $title, $location, $details, $start, $end);
		
		//Initiate cURL.
		$ch = curl_init($url);
		
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, true);		
		
		//Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		//Set the content type to application/json		
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json','Content-Length: ' . strlen($data)));
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		// Proxy
		GoogleApi::proxy($ch);

		// Execution
		// Si 200 OK
        $response = curl_exec($ch);
		
		// Recup code retour
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		// echo "<li>HTTP Code = ".$http_code;
		
		// Fermeture et nettoyage
        curl_close($ch);
        unset($ch);
		
		if ($http_code != 200) {
			echo "<li>url=".$url;
			echo "<li>acces_token=".$access_token;
			echo "<li>data=";
			print_r($data);
			echo "<li>response=";
			print_r($response);
			echo "<li>HTTP Code = ".$http_code;
		
			throw new Exception('Erreur à la création d\'événement');
		}
		
		return $response;
    }
}

?>