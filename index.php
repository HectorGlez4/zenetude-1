<?php

ini_set('display_errors', 1);

/**
 * Created by PhpStorm (tu veux une médaille ?).
 * User: sknz
 * Date: 05/12/14
 * Time: 03:39
 */

error_reporting(E_ALL);
require 'vendor/autoload.php';

function toJSON($app, $content) {
    $response = $app->response;
    $response['Content-Type'] = 'application/json';
    $response->body( json_encode($content) );
};

$app = new \Slim\Slim(array(
    'debug' => true
));

$app->get('/', function () {
    ?>
    <a href="reminder">Reminder</a><br/>
    <?php
});



//$app->get('/reminder', function () use ($app) {
   /*date_default_timezone_set('Europe/Paris');
    echo date('Y-m-d');
    $ch = curl_init();
    $source = 'http://ade-consult.pp.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=6445&projectId=8&startDay=' . date('d', time() + 3 * 24 * 60 * 60) . '&startMonth=' . date('m', time() + 3 * 24 * 60 * 60) . '&startYear=' . date('Y', time() + 3 * 24 * 60 * 60) . '&endDay=' . date('d', time() + 3 * 24 * 60 * 60) . '&endMonth=' . date('m', time() + 3 * 24 * 60 * 60) . '&endYear=' . date('Y', time() + 3 * 24 * 60 * 60) . '';
    //$source = 'http://ade-consult.pp.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=6445&startDay=' . date('d', time() + 3 * 24 * 60 * 60) . '&startMonth=' . date('m', time() + 3 * 24 * 60 * 60) . '&startYear=' . date('Y', time() + 3 * 24 * 60 * 60) . '&endDay=' . date('d', time() + 3 * 24 * 60 * 60) . '&endMonth=' . date('m', time() + 3 * 24 * 60 * 60) . '&endYear=' . date('Y', time() + 3 * 24 * 60 * 60) . '';
    
    curl_setopt($ch, CURLOPT_URL, $source);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true); 
    $data = curl_exec ($ch);
    curl_close ($ch);

    echo $data;
    $lines = explode(PHP_EOL, $data);
    $app->response->write(count($lines) . '<br/>');
    for ($i = 5; $i < count($lines); ++$i) // i = 6 Pereyti stroki zagolovka
    {

//        echo $i . ' ' . $lines[$i] . '<br/>';
        if (strstr($lines[$i], "BEGIN:VEVENT", $i))
        {
            ++$i; // Skip useless timestamp
            $date = substr($lines[++$i], 8, 8); //extract day from timestamp
            ++$i; // Skip useless timestamp
            echo $lines[++$i] . '<br/>';
            echo $lines[++$i] . '<br/>';
            ++$i;
            ++$i;
            echo $lines[++$i] . '<br />';
            $app->response->write($date . '<br/>');
            $d = date_create_from_format('Ymd', $date);
            echo $d->format('d/m/Y') . '<br/>' . '<br/>';
        }
    }
});*/




// ITS GONNA MAKE ME CRY A LOT
date_default_timezone_set('Europe/Paris');
$app->get('/reminder', function () use ($app) {
    //var_dump(date('d, H'));
    $ch = curl_init();
//    $day =
    $source = 'http://ade-consult.pp.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=6445&projectId=8&startDay=' . date('d', time() + 14 * 24 * 60 * 60 /*+14 jours*/ ) . '&startMonth=' . date('m', time() + 14 * 24 * 60 * 60) . '&startYear=' . date('Y', time() + 14 * 24 * 60 * 60) . '&endDay=' . date('d', time() + 14 * 24 * 60 * 60) . '&endMonth=' . date('m', time() + 14 * 24 * 60 * 60) . '&endYear=' . date('Y', time() + 14 * 24 * 60 * 60) . '';
    curl_setopt($ch, CURLOPT_URL, $source);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec ($ch);
    curl_close ($ch);

    //echo '<br/>' . $data . '</br>'.'</br>';

    $lines = explode(PHP_EOL, $data);
    // $app->response->write(count($lines) . '<br/>');
    for ($i = 5; $i < count($lines); ++$i) // i = 6 Pereyti stroki zagolovka
    {

         //echo $i . ' ' . $lines[$i] . '<br/>';
         if (strstr($lines[$i], "BEGIN:VEVENT"))
         {
            ++$i;
            ++$i;                                                                                               // DATE HEURE MINUTE DEBUT DE COURS

            $date = substr($lines[$i], 8, 8);
            $hour_start = substr($lines[$i], 17, 2);
            $min_start = substr($lines[$i], 19, 2);
            $d = date_create_from_format('Ymd', $date);
            echo $d->format('d/m/Y') . ' ' . $hour_start . ':' . $min_start . "</br>";
            ++$i;                                                                                               // HEURE ET MINUTE FIN DE COURS

            $hour_end = substr($lines[$i], 15, 2);
            $min_end = substr($lines[$i], 17, 2);
            echo $d->format('d/m/Y') . ' ' . $hour_end . ':' . $min_end . "</br>";

            ++$i;                                                                                                // MATIERE
            $topic = substr($lines[$i], 8);
            echo utf8_encode($topic) . "</br>";

            ++$i;                                                                                               //CLASSE
            $room = substr($lines[$i], 9);
            echo $room . "</br>";

            ++$i;                                                                                               //NOM PRENOM
            $full_description  = $lines[$i]; 
            $nom_prenom = explode('\n', $full_description);
            echo utf8_encode($nom_prenom[2]) . "</br>";
         }
    }
});


$app->run();