<?php

//1.Start Session
	 session_start();
	//2.Use app id,secret and redirect url
	 //$app_id = '1207370725956552';
	 $app_id = '918372571582116';
	 //$app_secret = '1b83b246d8f61a10d05879a692494c63';
	 $app_secret = 'd7e65bcc1b115416ac34c8eeab42f0e2';
	 $redirect_url='http://localhost/zenetude-1/php/index.php';

	 //3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();
	 $_SESSION['sess'] = $sess;
	 header('Location: '.$helper->getLoginUrl().'');

	//4. if fb sess exists echo name
	//if(isset($sess)){
