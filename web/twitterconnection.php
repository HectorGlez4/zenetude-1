<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 24/11/2015
 * Time: 16:06
 */

use Abraham\TwitterOAuth\TwitterOAuth;

session_start();
require '../twitteroauth-master/autoload.php';
require '../twitteroauth-master/src/TwitterOAuth.php';


$consumerKey = 'kMD4spi1lGNeQhmOGR4ioZSyE';
$consumerSecret = 'C7YSSjGJalAJA4uk6aBNtjD02CPGwhYxSD1ri00gOYCpN5eMv2';


//this code will run when returned from twiter after authentication
if(isset($_SESSION['oauth_token'])){
    $oauth_token=$_SESSION['oauth_token'];unset($_SESSION['oauth_token']);
    $consumer_key = 'kMD4spi1lGNeQhmOGR4ioZSyE';
    $consumer_secret = 'C7YSSjGJalAJA4uk6aBNtjD02CPGwhYxSD1ri00gOYCpN5eMv2';
    $connection = new TwitterOAuth($consumer_key, $consumer_secret);
    //necessary to get access token other wise u will not have permision to get user info
    $params=array("oauth_verifier" => $_GET['oauth_verifier'],"oauth_token"=>$_GET['oauth_token']);
    $access_token = $connection->oauth("oauth/access_token", $params);
    //now again create new instance using updated return oauth_token and oauth_token_secret because old one expired if u dont u this u will also get token expired error
    $connection = new TwitterOAuth($consumer_key, $consumer_secret,
        $access_token['oauth_token'],$access_token['oauth_token_secret']);
    $content = $connection->get("account/verify_credentials");
    print_r($content);
}
else{
    // main startup code
    $consumer_key = 'your consumer key';
    $consumer_secret = 'your secret key';
    //this code will return your valid url which u can use in iframe src to popup or can directly view the page as its happening in this example

    $connection = new TwitterOAuth($consumer_key, $consumer_secret);
    $temporary_credentials = $connection->oauth('oauth/request_token', array("oauth_callback" =>'http://dev.crm.alifca.com/twitter/index.php'));
    $_SESSION['oauth_token']=$temporary_credentials['oauth_token'];
    $_SESSION['oauth_token_secret']=$temporary_credentials['oauth_token_secret'];$url = $connection->url("oauth/authorize", array("oauth_token" => $temporary_credentials['oauth_token']));
// REDIRECTING TO THE URL
    header('Location: ' . $url);
}
