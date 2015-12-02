<?php

	ini_set('display_errors', 0);

	//if(session_id() == '')
		//session_start();

	if ((isset($_GET['error'])) || (isset($_GET['denied']))){
    	header('Location: index.php?refus=true');
	}

	include_once 'socialmediadata.php';

	
		
			               
		//_______________________________________BEGIN FACEBOOK_______________________________________________             
				    
	
		/* INCLUSION OF LIBRARY FILEs*/
			require_once( '../../Facebook/FacebookSession.php');
			require_once( '../../Facebook/FacebookRequest.php' );
			require_once( '../../Facebook/FacebookResponse.php' );
			require_once( '../../Facebook/FacebookSDKException.php' );
			require_once( '../../Facebook/FacebookRequestException.php' );
			require_once( '../../Facebook/FacebookRedirectLoginHelper.php');
			require_once( '../../Facebook/FacebookAuthorizationException.php' );
			require_once( '../../Facebook/GraphObject.php' );
			require_once( '../../Facebook/GraphUser.php' );
			require_once( '../../Facebook/GraphSessionInfo.php' );
			require_once( '../../Facebook/Entities/AccessToken.php');
			require_once( '../../Facebook/HttpClients/FacebookCurl.php' );
			require_once( '../../Facebook/HttpClients/FacebookHttpable.php');
			require_once( '../../Facebook/HttpClients/FacebookCurlHttpClient.php');

		/* USE NAMESPACES */
	
			use Facebook\FacebookSession;
			use Facebook\FacebookRedirectLoginHelper;
			use Facebook\FacebookRequest;
			use Facebook\FacebookResponse;
			use Facebook\FacebookSDKException;
			use Facebook\FacebookRequestException;
			use Facebook\FacebookAuthorizationException;
			use Facebook\GraphObject;
			use Facebook\GraphUser;
			use Facebook\GraphSessionInfo;
			use Facebook\FacebookHttpable;
			use Facebook\FacebookCurlHttpClient;
			use Facebook\FacebookCurl;

		/*PROCESS*/
			
			//1.Start Session
			
			//2.Use app id,secret and redirect url
			$app_id = '1207370725956552';
			$app_secret = '1b83b246d8f61a10d05879a692494c63';
			$redirect_url='http://localhost/zenetude-1/php/view/index.php';
			 
			//3.Initialize application, create helper object and get fb sess
			FacebookSession::setDefaultApplication($app_id,$app_secret);
			$helper = new FacebookRedirectLoginHelper($redirect_url);
			//$email = $helper->getLoginUrl(['email']);
			$sess = $helper->getSessionFromRedirect();

			//4. if fb sess exists echo name 
			if(isset($sess)){
				$sess = new FacebookSession($sess->getToken());
					//create request object,execute and capture response
				$request = new FacebookRequest($sess, 'GET', '/me?fields=id,first_name,last_name,email');
				// from response get graph object
				$response = $request->execute();
				//$graph = $response->getGraphObject(GraphUser::className())->asArray();
				$graph = $response->getGraphObject(GraphUser::className());

				//echo $graph->getProperty('email');
				
				//var_dump($graph);
				//echo $graph['email'];
			
				$email = $graph->getProperty('email');
				// use graph object methods to get user details
				$_SESSION['nom'] = $graph->getProperty('first_name');
				$_SESSION['prenom'] = $graph->getProperty('last_name');
				//$email = $graph->getEmail();
				$id = $graph->getId();
				$picture = "http://graph.facebook.com/$id/picture/";
				addDataFacebook($email, $picture); 	


				header('Location: index.php');




			}else{

				//else echo login
				//echo '<a href='.$helper->getLoginUrl().'>Login with facebook</a>';

				echo '<a href="'.$helper->getLoginUrl(array('scope' => 'email')).'"><img src="../../img/FacebookLogo.png" alt="Se connecter avec Facebook""></a>';
			}
            
	//__________________________________________END FACEBOOK___________________________________

	//__________________________________________BEGIN TWITTER___________________________________






	require_once('../../TwitterOauth/OAuth.php');
	require_once('../../TwitterOauth/twitteroauth.php');

	define('CONSUMER_KEY', 'nlOVxx4qz4DDWYFlSPWlbsZWO');
	define('CONSUMER_SECRET', 'BEGyzam5iYaaBTKc7KaunoEEZFk7QNG9FSJOe4vXKr0gQ2Q19T');
	define('OAUTH_CALLBACK', 'http://localhost/zenetude-1/php/view/index.php');

	

	if(isset($_GET['logout'])){
	    //unset the session
	    session_unset();
	    // redirect to same page to remove url paramters
	    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
	}
	// 2. if user session not enabled get the login url
	if(!isset($_SESSION['data']) && !isset($_GET['oauth_token'])) {
	    // create a new twitter connection object
	    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	    // get the token from connection object
	    $request_token = $connection->getRequestToken(OAUTH_CALLBACK);
	    // if request_token exists then get the token and secret and store in the session
	    if($request_token){
		$token = $request_token['oauth_token'];
		$_SESSION['request_token'] = $token ;
		$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
		// get the login url from getauthorizeurl method
		$login_url = $connection->getAuthorizeURL($token);
	    }
	}

	// 3. if its a callback url
	if(isset($_GET['oauth_token'])){
	    // create a new twitter connection object with request token
	    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
	    // get the access token from getAccesToken method
	    $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	    if($access_token){
			// create another connection object with access token
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token	['oauth_token_secret']);
			// set the parameters array with attributes include_entities false
			$params = array('include_entities'=>'true', 'include_email'=>'true');
			// get the data
			$data = $connection->get('account/verify_credentials',$params);
			if($data){
				// store the data in the session
				$_SESSION['data'] = $data;
				$nomprenom = split(" ", $data->name);
				$_SESSION['nom'] = $nomprenom[0];
				$_SESSION['prenom'] = $nomprenom[1];

				
				//$_SESSION['image'] = $picture;
				// redirect to same page to remove url parameters
				$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
				header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
			}
	    }
	}
	/* 
	 * PART 3 - FRONT END 
	 *  - if userdata available then print data
	 *  - else display the login url
	*/
	if(isset($login_url) && !isset($_SESSION['data'])){
	    // echo the login url
	    //echo "<a href='$login_url'><button>Login with twitter </button></a>";
		echo '<a id="twitterimg" href="'.$login_url.'"><img src="../../img/TwitterLogo.png" alt="Se connecter avec Twitter" ></a>';
	}
	else{
	
//echo "<script>alert('la');</script>";

	    // get the data stored from the session
	    $data = $_SESSION['data'];

	 
		//$nomprenom = split(" ", $data->name);

		//$_SESSION['nom'] = $nomprenom[0];
		//$_SESSION['prenom'] = $nomprenom[1];
		
		$email = $data->email;
		$picture = $data->profile_image_url;

		
	addDataTwitter($email, $picture);

		//$lol = $data->name;
	    // echo the name username and photo
	    //echo "Name : ".$data->name."<br>";
	    //echo "Username : ".$data->screen_name."<br>";
	    //echo "Photo : <img src='".$data->profile_image_url."'/><br><br>";
	    // echo the logout button
	    //echo "<a href='?logout=true'><button>Logout</button></a>";
		//var_dump($data);
		echo '<script>document.location.href="index.php"</script>';
	    //header("Location: index.php");
	



}




	//__________________________________________END TWITTER___________________________________

	//__________________________________________BEGIN GOOGLE +___________________________________

	
	require_once '../../google_login_oauth/src/Google_Client.php';
	require_once '../../google_login_oauth/src/contrib/Google_Oauth2Service.php';

	if(isset($_GET['logout'])){
	    //unset the session
	    session_unset();
	    // redirect to same page to remove url paramters
	    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
	}

	$client = new Google_Client();
	$client->setApplicationName("Google UserInfo PHP Starter Application");

	$oauth2 = new Google_Oauth2Service($client);

	if (isset($_GET['code'])) {
	  $client->authenticate($_GET['code']);
	  $_SESSION['token'] = $client->getAccessToken();
	  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
	  return;
	}

	if (isset($_SESSION['token'])) {
	 $client->setAccessToken($_SESSION['token']);
	}

	if (isset($_REQUEST['logout'])) {
	  unset($_SESSION['token']);
	  $client->revokeToken();
	}

	if ($client->getAccessToken()) {
	  $user = $oauth2->userinfo->get();

	//  print_r($user);
	//  $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	//  $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
	    $_SESSION['isConnectGoogle'] = "1";
	  $content = $user;

	  $_SESSION['token'] = $client->getAccessToken();
	  $_SESSION['nom'] = $content['name'];
	} else {
	  $authUrl = $client->createAuthUrl();
	}
	if(isset($authUrl)) {
	    //$form = "<a class='login' href='$authUrl'><img src='images/googleconnect3.png' /></a>";
$form = '<a href="'.$authUrl.'"><img src="../../img/googleLogo.png" alt="Se connecter avec Google+""></a>';
		echo $form;
	  }
	//include("html.php");

			//print_r($content);
		    
		        //echo $content['name'];
		   

		    //if (($content) && ($_SESSION['isConnectGoogle'])){
		   if (isset($_SESSION['isConnectGoogle'])){
		        //echo "<a href='?logout=true'>Se déconnecter</a>";
				$email = $content['email'];
				$picture = $content['picture'];
				addDataGoogle($email, $picture);			

				//var_dump($content);
				header('Location: index.php');
		    }


		?>

