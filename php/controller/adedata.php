<?php
    error_reporting(E_ALL);
    require '../../vendor/autoload.php';
    require '../../vendor/PHPMailer/PHPMailerAutoload.php';
    //Set default timezone
    date_default_timezone_set('Europe/Paris');
    //Function take back data from agenda ADE
    $ch = curl_init();
    //Number of day the data come from
    $nbDays = 3;
    //ADE Agenda's id (6445 = lp sil da2i)
    $ressource = 6445;
    //Agenda's URL where data come from
    $source = 'http://ade-consult.pp.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=' . $ressource . '&projectId=8&startDay=' . date('d', time() + $nbDays * 24 * 60 * 60 /*+14 jours*/ ) . '&startMonth=' . date('m', time() + $nbDays * 24 * 60 * 60) . '&startYear=' . date('Y', time() + $nbDays * 24 * 60 * 60) . '&endDay=' . date('d', time() + $nbDays * 24 * 60 * 60) . '&endMonth=' . date('m', time() + $nbDays * 24 * 60 * 60) . '&endYear=' . date('Y', time() + $nbDays * 24 * 60 * 60) . '';
    curl_setopt($ch, CURLOPT_URL, $source);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec ($ch);
    curl_close ($ch);
    //echo $data;
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
            $hour_start += 1;
            $min_start = substr($lines[$i], 19, 2);
            $d = date_create_from_format('Ymd', $date);
            echo $d->format('d/m/Y') . ' ' . $hour_start . ':' . $min_start . "</br>";
            // date and hour of the beginning class
            ++$i;
            $hour_end = substr($lines[$i], 15, 2);
            $hour_end += 1;
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
                $full_name = explode(' ', $parameter);
                
                //Save first and last name into 2 var
                $last_name = strtolower($full_name[0]);
                $first_name = strtolower($full_name[1]);

                $content ='<html>
                            <head>
                              <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                              <title>PHPMailer Test</title>
                            </head>
                            <body>
                                <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 20px;">
                                  <h1>Rappel enseignement</h1>
                                  <div align="center">
                                    <p>Bonjour ' . $first_name . ' ' . $last_name . ' ! 
                                    N\'oubliez pas que vous avez cours le ' . $d->format('d/m/Y') . ' de ' . $hour_start . ':' . $min_start . ' à ' . $hour_end . ':' . $min_end . '
                                    en ' . $room . ' pour la matière ' . $subject . '.</p>
                                  </div>
                                </div>
                            </body>
                        </html>';

                //Create a new PHPMailer instance
                $mail = new PHPMailer;
                //Set who the message is to be sent from
                $mail->setFrom('Zenetude', '');
                //Set an alternative reply-to address
                /*$mail->addReplyTo('replyto@example.com', 'First Last');*/
                //Connect to database
                $db = connect();         
            
                //$request = $db -> prepare('SELECT user_instituteemail FROM User WHERE user_firstname = "dylan" AND user_name = "prudhomme"');
                $request = $db -> prepare('SELECT user_instituteemail FROM User WHERE user_firstname = "'. $first_name . '" AND user_name = "' . $last_name . '"');
                $request -> execute();
                $results = $request -> fetchAll();
                foreach ($results as $result) {
                    //Save mail receive
                    $mailbd = $result[0];
                    //Set who the message is to be sent to
                    $mail->addAddress($mailbd, $first_name . ' ' . $last_name);
                    //Set the subject line
                    $mail->Subject = 'PHPMailer mail() test';
                    $mail->isHTML(true);
                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    //$mail->Body = file_get_contents('examples/contents.html');
                    //Replace the plain text body with one created manually
                    $mail->Body = utf8_decode($content);
                    //Attach an image file
                    //$mail->addAttachment('examples/images/phpmailer_mini.png');
                    //Send the message, check for errors
                    if (!$mail->send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo . "</br>";
                    } else {
                        echo "Message sent!" . "</br>";
                    }
                }
            }
        }
    }
