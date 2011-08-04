<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>twitterOAuthPluginSetup set up</title>
<style type="text/css">
<!--
body{
background-color:#FFFFFF !important;
color:#000000 !important;
padding: 10px;
}
-->
</style>
</head>
<body>
<img src="http://www.sydneyguttersnipe.com/images/symfony_plugin/twitter_developers.png" /><br/>
<img src="http://www.sydneyguttersnipe.com/images/symfony_plugin/wind-up-bird.png" />
<p>This plugin was developed to allow you to post to ONE twitter account programatically.</p>
<p>This plugin uses classes originally developed by <a href="http://abrah.am/" target="_blank">Abraham      Williams</a>, <a href="http://github.com/abraham/twitteroauth" target="_blank">TwitterOAuth</a> handles      the authentication of OAuth requests to      interface with Twitter.</p>
<p>&nbsp;</p>
<p><strong>Steps:</strong></p>
<p>1. Log into the Twitter account you want this symfony project to post to.</p>
<p>2. Go to <a href="http://dev.twitter.com/apps" target="_blank">http://dev.twitter.com/apps</a> and 'Register a new application'.</p>
<p>3. Give your application a unique name and description</p>
<p>4. for Application Website: enter, <?php echo 'http://'.$_SERVER["SERVER_NAME"] ?></p>
<p>5. Callback URL may be left blank. There’s no login process, so there’s no need to provide          a URL to redirect users to.</p>
<p>6. Default Access type refers to the access          your application will have to Twitter.           Read &amp; Write allows complete access. This is          almost certainly what you want for your this project.</p>
<p>7. Replace the 'xxx' in the  the plugin app.yml, twitterOAuthPlugin/config/app.yml, with your Consumer Key &amp; the Consumer Secret.<br />
</p>
<p><em><strong> twitter_consumer_key: xxx<br />
  twitter_consumer_secret: xxx</strong></em></p>
<p>&nbsp;</p>
<p>8. Go to 'My Acesss token'</p>
<p><img src="http://www.sydneyguttersnipe.com/images/symfony_plugin/my_access_token.png" /></p>
<p>&nbsp;</p>
<p>9. Replace the 'xxx' in the  the plugin app.yml, twitterOAuthPlugin/config/app.yml, with your Access Token &amp; the Access Token Secret.</p>
<p><em><strong> twitter_access_token: xxx<br />
  twitter_ access_token_secret: xxx</strong></em></p>
<p>10. Save the app.yml and clear cache.</p>
<p>11. To post a message to your Twitter account use the following static method in twitterOAuthPlugin.class.php</p>
<p>public static function sendTweet($message = null) { .....</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>eg: twitterOAuthPlugin::sendTweet('Test Message');</p>
<p>&nbsp;</p>
<p>Steve Sonius</p>
<p><a href="http://blog.baddog.net.au/sonius/" target="_blank">http://blog.baddog.net.au/sonius/</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<p>&nbsp;</p>
</body>
</html>
