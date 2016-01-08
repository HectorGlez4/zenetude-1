<?php



	ini_set('display_errors', 1);


	if ((isset($_GET['error'])) || (isset($_GET['denied']))){
        session_destroy();
		header('Location: index.php?refus=true');
	}

    if (isset($_GET['error_code'])){
        session_destroy();
        header('Location: index.php?failure=true');
    }

	include_once '../model/socialmediadata.php';
    include_once '../../secure/config.php';


	//_______________________________________BEGIN FACEBOOK_______________________________________________


	/* INCLUSION OF LIBRARY FILEs*/

	require_once('../../vendor/Facebook/FacebookSession.php');
	require_once('../../vendor/Facebook/FacebookRequest.php');
	require_once('../../vendor/Facebook/FacebookResponse.php');
	require_once('../../vendor/Facebook/FacebookSDKException.php');
	require_once('../../vendor/Facebook/FacebookRequestException.php');
	require_once('../../vendor/Facebook/FacebookRedirectLoginHelper.php');
	require_once('../../vendor/Facebook/FacebookAuthorizationException.php');
	require_once('../../vendor/Facebook/GraphObject.php');
	require_once('../../vendor/Facebook/GraphUser.php');
	require_once('../../vendor/Facebook/GraphSessionInfo.php');
	require_once('../../vendor/Facebook/Entities/AccessToken.php');
	require_once('../../vendor/Facebook/HttpClients/FacebookCurl.php');
	require_once('../../vendor/Facebook/HttpClients/FacebookHttpable.php');
	require_once('../../vendor/Facebook/HttpClients/FacebookCurlHttpClient.php');

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
	use Facebook\HttpClients\FacebookCurlHttpClient;
	use Facebook\HttpClients\FacebookHttpable;
	use Facebook\HttpClients\FacebookCurl;


	/*PROCESS*/

	//1.Start Session

	//2.Use app id,secret and redirect url
    $app_id = $facebookapikey;
    $app_secret = $facebookapisecret;
	$redirect_url='http://zenetude.esy.es/php/view/index.php';

	//3.Initialize application, create helper object and get fb sess
	FacebookSession::setDefaultApplication($app_id,$app_secret);
	$helper = new FacebookRedirectLoginHelper($redirect_url);

	$sess = $helper->getSessionFromRedirect();
	$_SESSION['sessFacebook'] = $sess;

	//4. if fb sess exists echo name
	//if(isset($sess)){
	if(isset($_SESSION['sessFacebook'])){
		$sess = new FacebookSession($_SESSION['sessFacebook']->getToken());
		//create request object,execute and capture response
		$request = new FacebookRequest($sess, 'GET', '/me?fields=id,first_name,last_name,email');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		// use graph object methods to get user details
		$email = $graph->getProperty('email');
		$id = $graph->getId();
		$picture = "http://graph.facebook.com/$id/picture/";

		addDataFacebook($email, $picture);


	}else{

        //L'hébergeur (Hostinger) bloque les requêtes CURL sortantes
        echo "<img onclick=\"alert('Connexion à Facebook impossible');\" src='../../img/FacebookLogo.png' alt='Se connecter avec Facebook'>";


        //Si l'hébergeur ne bloque pas les requêtes CURL sortantes
        //echo '<a href="'.$helper->getLoginUrl(array('scope' => 'email')).'"><img src="../../img/FacebookLogo.png" alt="Se connecter avec Facebook""></a>';

    }

	//__________________________________________END FACEBOOK___________________________________
	//__________________________________________BEGIN TWITTER___________________________________


	require_once('../../vendor/TwitterOauth/OAuth.php');
	require_once('../../vendor/TwitterOauth/twitteroauth.php');


    define('CONSUMER_KEY', $twitterapikey);
    define('CONSUMER_SECRET', $twitterapisecret);
	define('OAUTH_CALLBACK', 'http://zenetude.esy.es/php/view/index.php');

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


        try{
		    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
        }catch (OAuthException $e){
            $e->getMessage();
        }


        try{

		// get the token from connection object
		$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

        }catch (OAuthException $e){
            $e->getMessage();
        }


		// if request_token exists then get the token and secret and store in the session
		if(isset($request_token)){
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
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
			// set the parameters array with attributes include_entities false
			$params = array('include_entities'=>'true', 'include_email'=>'true');
			// get the data
			$data = $connection->get('account/verify_credentials',$params);
			if($data){
				// store the data in the session
				$_SESSION['data'] = $data;
				$data = $_SESSION['data'];
				$email = $data->email;
				$picture = $data->profile_image_url;
				addDataTwitter($email, $picture);
			}
		}
	}

	if(isset($login_url) && !isset($_SESSION['data'])){

        //L'hébergeur (Hostinger) bloque les requêtes CURL sortantes
        echo "<img onclick=\"alert('Connexion à Twitter impossible');\" src='../../img/TwitterLogo.png' alt='Se connecter avec Twitter'>";


        //Si l'hébergeur ne bloque pas les requêtes CURL sortantes
        //echo '<a id="twitterimg" href="'.$login_url.'"><img src="../../img/TwitterLogo.png" alt="Se connecter avec Twitter" ></a>';

    }

	//__________________________________________END TWITTER___________________________________
	//__________________________________________BEGIN GOOGLE +___________________________________


	require_once '../../vendor/google_login_oauth/src/Google_Client.php';
	require_once '../../vendor/google_login_oauth/src/contrib/Google_Oauth2Service.php';


	if(isset($_GET['logout'])){
		//unset the session
		session_unset();
		// redirect to same page to remove url paramters
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
	}
	$client = new Google_Client();
	$client->setApplicationName("Zenetude");
	$oauth2 = new Google_Oauth2Service($client);
	if (isset($_GET['code'])) {
		$client->authenticate($_GET['code']);
		$_SESSION['token'] = $client->getAccessToken();
		$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

		echo '<script>document.location.href="index.php"</script>';


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

		$email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
		$img = filter_var($user['picture'], FILTER_VALIDATE_URL);
		$_SESSION['isConnectGoogle'] = "1";
		$_SESSION['userDataGoogle'] = $user;
		$email = $user['email'];
		$picture = $user['picture'];
		addDataGoogle($email, $img);

	} else {

		$authUrl = $client->createAuthUrl();

	}


	if(isset($authUrl)) {

		$form = '<a href="'.$authUrl.'"><img src="../../img/googleLogo.png" alt="Se connecter avec Google+"></a>';
		echo $form;

	}


?>