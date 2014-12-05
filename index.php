<?php
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


// ITS GONNA MAKE ME CRY
$app->get('/reminder', function () use ($app) {
    $ch = curl_init();
//    $day =
    $source = 'http://planning.univ-amu.fr/ade/custom/modules/plannings/anonymous_cal.jsp?resources=6445&projectId=8&startDay=' . date('d', time() + 3 * 24 * 60 * 60) . '&startMonth=' . date('m', time() + 3 * 24 * 60 * 60) . '&startYear=' . date('Y', time() + 3 * 24 * 60 * 60) . '&endDay=' . date('d', time() + 3 * 24 * 60 * 60) . '&endMonth=' . date('m', time() + 3 * 24 * 60 * 60) . '&endYear=' . date('Y', time() + 3 * 24 * 60 * 60) . '';
    curl_setopt($ch, CURLOPT_URL, $source);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec ($ch);
    curl_close ($ch);

    echo '<br/>' . $data . '</br>'.'</br>';

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
            echo $lines[++$i] . '<br/>';
            $app->response->write($date . '<br/>');
            $d = date_create_from_format('Ymd', $date);
            echo $d->format('d/m/Y') . '<br/>' . '<br/>';
        }
    }
});

$app->run();

