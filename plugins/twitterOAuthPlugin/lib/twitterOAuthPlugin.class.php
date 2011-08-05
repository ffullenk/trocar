<?php
class twitterOAuthPlugin{

    public static function sendTweet($message = null) {	

        if(!$message)
		$message = "The datetime is ".date('Y-m-d H:i:s');
		
        $consumer_key = sfConfig::get('app_twitter_consumer_key');
        $consumer_secret = sfConfig::get('app_twitter_consumer_secret');
        $accessToken = sfConfig::get('app_twitter_access_token');
        $accessTokenSecret = sfConfig::get('app_twitter_access_token_secret');
		
		//Debug:
		#echo "consumer_key = $consumer_key<br/>";
        #echo "consumer_secret = $consumer_secret<br/>";
        #echo "accessToken = $accessToken<br/>";
        #echo "accessTokenSecret = $accessTokenSecret<br/>";
		#echo "message = $message<br/>";
		
		

// Create our twitter API object
        $oauth = new TwitterOAuth($consumer_key, $consumer_secret, $accessToken, $accessTokenSecret);

// Send an API request to verify credentials
        $credentials = $oauth->get("account/verify_credentials");
       // echo "Connected as @" . $credentials->screen_name;

// Post our new "hello world" status
        $posted = $oauth->post('statuses/update', array('status' => $message));
		
		//Debug:
		#var_dump($posted);
		
    }




}