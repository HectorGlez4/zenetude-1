<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 24/11/2015
 * Time: 08:47
 */



//require '../facebook-php-sdk-v4-4.0-dev/autoload.php';
//
//
//session_start();
//
//$appId = '1207370725956552';
//$appSecret = '1b83b246d8f61a10d05879a692494c63';
//
//\Facebook\FacebookSession::setDefaultApplication($appId, $appSecret);
//
//$helper = new \Facebook\FacebookRedirectLoginHelper("http://localhost/zenetude/web/facebookconnection.php");
//
//if(isset($_SESSION) && isset($_SESSION["fb_token"])){ //si on a déjà un token d'accès
//
//    $session = new \Facebook\FacebookSession($_SESSION["fb_token"]); //on crée une session facebook
//
//}else{
//    echo 'sans session';
//    $session = new $helper->getSessionFromRedirect(); //redirection vers facebook
//}
//
//if ($session){ //si on a la session
//
//    echo "session ok";
//    $_SESSION["fb_token"] = $session->getToken(); // on récupère le token d'accès propre à l'utilisateur
//    $request = new \Facebook\FacebookRequest($session, 'GET', '/me');
//    $profile = $request->execute()->getGraphObject('Facebook\GraphUser');
//    echo $profile->getFirstName();
//
//}else{
//
//    echo "form";
//    echo '<a href="'.$helper->getLoginUrl().'">se connecter à facebook</a>'; //sinon on veut que l'utilisateur se connecte
//}

ob_start();
session_start();
// include required files form Facebook SDK
// added in v4.0.5
//require_once( 'Facebook/FacebookHttpable.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookHttpable.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookCurl.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookCurlHttpClient.php' );

// added in v4.0.0
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookSession.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRequest.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookResponse.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookSDKException.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRequestException.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookOtherException.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookAuthorizationException.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/GraphObject.php' );
require_once( '../facebook-php-sdk-v4-4.0-dev/src/Facebook/GraphSessionInfo.php' );

// added in v4.0.5
use Facebook\FacebookHttpable;
use Facebook\FacebookCurl;
use Facebook\FacebookCurlHttpClient;


// added in v4.0.0
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
echo 'après les require et use';
$id = '1207370725956552'; // please use yours
$secret = '1b83b246d8f61a10d05879a692494c63'; // please use yours
FacebookSession::setDefaultApplication($id, $secret);

$helper = new FacebookRedirectLoginHelper('http://localhost/zenetude/web/facebookconnection.php');

// see if a existing session exists
if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
    // create new session from saved access_token
    $session = new FacebookSession($_SESSION['fb_token']);
    // validate the access_token to make sure it's still valid
    try {
        if (!$session->validate()) {
            $session = null;
        }
    } catch (Exception $e) {
        // catch any exceptions
        $session = null;
    }
} else {
    // no session exists
    try {
        $session = $helper->getSessionFromRedirect();
    } catch (FacebookRequestException $ex) {
        // When Facebook returns an error
    } catch (Exception $ex) {
        // When validation fails or other local issues
        echo $ex->getMessage();
    }
}

// see if we have a session
if (isset($session)) {
    // save the session
    $_SESSION['fb_token'] = $session->getToken();
    // create a session using saved token or the new one we generated at login
    //$session = new FacebookSession($session->getToken());
    // graph api request for user data
    $request = new FacebookRequest($session, 'GET', '/me');
    //$response = $request->execute();
    $graphObject = $response->getGraphObject();
    //$graphObject = $request->execute()->getGraphObject('Facebook\GraphUser');

    //$_SESSION['valid'] = true;
    //$_SESSION['timeout'] = time();

    //$_SESSION['FB'] = true;

    //$_SESSION['usernameFB'] = $graphObject['name'];
    //echo $graphObject->getFirstName();
    echo $graphObject->getProperty( 'id' );
    //$_SESSION['idFB'] = $graphObject['id'];
    //$_SESSION['first_nameFB'] = $graphObject['first_name'];
    //$_SESSION['last_nameFB'] = $graphObject['last_name'];
    //$_SESSION['genderFB'] = $graphObject['gender'];

    // logout and destroy the session, redirect url must be absolute url
    //$linkLogout = $helper->getLogoutUrl($session, 'http://localhost/zenetude/web/redirect.php?action=logout');

    //$_SESSION['logoutUrlFB'] = $linkLogout;
    //header('Location: index.php');
}else {
    //if (empty($_SESSION)){
        echo '<a href="'.$helper->getLoginUrl().'">se connecter à facebook</a>'; //sinon on veut que l'utilisateur se connecte
    //}
}



