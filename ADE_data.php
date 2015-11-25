<?php

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

    //Set default timezone
    date_default_timezone_set('Europe/Paris');

    //Function take back data from agenda ADE
    $app->get('/reminder', function () use ($app) {
        $ch = curl_init();

        //Number of day the data come from
        $nbDays = 3;

        //Agenda's URL where data come from
        $source = 'http://ade-consult.pp.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=6445&projectId=8&startDay=' . date('d', time() + $nbDays * 24 * 60 * 60 /*+14 jours*/ ) . '&startMonth=' . date('m', time() + $nbDays * 24 * 60 * 60) . '&startYear=' . date('Y', time() + $nbDays * 24 * 60 * 60) . '&endDay=' . date('d', time() + $nbDays * 24 * 60 * 60) . '&endMonth=' . date('m', time() + $nbDays * 24 * 60 * 60) . '&endYear=' . date('Y', time() + $nbDays * 24 * 60 * 60) . '';
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec ($ch);
        curl_close ($ch);

        $lines = explode(PHP_EOL, $data);

        for ($i = 5; $i < count($lines); ++$i)
        {
             //echo $i . " " . $lines[$i] . "</br>";
             if (strstr($lines[$i], "BEGIN:VEVENT"))
             {
                // Skip useless lines
                ++$i;

                // date and hour of the beginning class
                ++$i;
                $date = substr($lines[$i], 8, 8);
                $hour_start = substr($lines[$i], 17, 2);
                $min_start = substr($lines[$i], 19, 2);
                $d = date_create_from_format('Ymd', $date);
                echo $d->format('d/m/Y') . ' ' . $hour_start . ':' . $min_start . "</br>";

                // date and hour of the beginning class
                ++$i;
                $hour_end = substr($lines[$i], 15, 2);
                $min_end = substr($lines[$i], 17, 2);
                echo $d->format('d/m/Y') . ' ' . $hour_end . ':' . $min_end . "</br>";

                // Subjects
                ++$i;                                                                                                
                $subject = substr($lines[$i], 8);
                echo utf8_decode($subject) . "</br>";

                // Room
                ++$i;                                                                                               
                $room = substr($lines[$i], 9);
                echo $room . "</br>";
                
                // Teacher's first name and last name
                ++$i;
                $full_description  = $lines[$i]; 
                $first_last_name = explode('\n', $full_description);

                //Decode of the utf-8 encode
                $parameter = utf8_decode($first_last_name[2]);

                //Test of existing name
                $first_carac = substr($first_last_name[2], 0, 1);

                // If name doesn't exist, print nothing
                if ($first_carac == "(") {
                    echo '';
                }
                // Else save first name and last name
                else {
                    echo $parameter ."</br>";
                    $full_name = explode(' ', $parameter);
                    echo strtolower($full_name[0]) . "</br>";
                    echo strtolower($full_name[1]) . "</br>";
                }
            }
        }
    });

    $app->run();
