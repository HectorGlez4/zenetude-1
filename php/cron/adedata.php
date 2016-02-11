<?php
    error_reporting(E_ALL);
    require '../../vendor/autoload.php';
    require '../../vendor/PHPMailer/PHPMailerAutoload.php';
    include_once '../model/ademodel.php';
    include_once '../model/db.php';
    //Set default timezone
    date_default_timezone_set('Europe/Paris');
    //Function take back data from agenda ADE
    $ch = curl_init();
    //Number of day the data come from
    $nbDays = 12;
    //ADE Agenda's id (6445 = lp sil da2i)

    //tableau contenant les id des professeurs
    //obligé des les rentrer en brut après recherche sur le site de l'ADE car aucune base ni requette n'existe pour les récupérer automatiquement
    $ressource = array('11158', '4126', '5468', '15002', '5539', '3586', '7927', '3457', '36540', '41262', '5344', '4502', '7928', '4372', '5721');

    //liste des id des professeurs trouvé sur l'ADE
    //    11158     // Berthier
    //    4126      //Pain barre
    //    5468      //Slezak
    //    15002     //Gantaume
    //    5539      //Valiante
    //    3586      //Bonhomme
    //    7927      //Barathon
    //    3457      //Lokhal
    //    36540     //Lopez
    //    41262     //Fernandez Blanco
    //    5344      //Broche
    //    4502      //Cicchetti
    //    7928      //Lasson
    //    4372      //Vaquieri
    //    5721      //Martin-nevot

    //Agenda's URL where data come from

    //nom et prénom sauvegardés pour ajouter tous les cours de la journée dans un seul mail
    $save_first_name = '';
    $save_last_name = '';

    foreach($ressource as $v) {
        $ch = curl_init();
        $source = 'http://ade-consult.pp.univ-amu.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=' . $v . '&projectId=8&startDay=' . date('d', time() + $nbDays * 24 * 60 * 60 /*+14 jours*/) . '&startMonth=' . date('m', time() + $nbDays * 24 * 60 * 60) . '&startYear=' . date('Y', time() + $nbDays * 24 * 60 * 60) . '&endDay=' . date('d', time() + $nbDays * 24 * 60 * 60) . '&endMonth=' . date('m', time() + $nbDays * 24 * 60 * 60) . '&endYear=' . date('Y', time() + $nbDays * 24 * 60 * 60) . '';
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        //echo $data;

        //si ça ne match pas, c'est que le professeur n'as pas de cours
        if (preg_match("/BEGIN:VEVENT/i", $data)) {
            $lines = explode(PHP_EOL, $data);
            for ($i = 5; $i < count($lines); ++$i) {
                //echo $i . " " . $lines[$i] . "</br>";
                if (strstr($lines[$i], "BEGIN:VEVENT")) {
                    // Skip useless lines
                    ++$i;
                    // date and hour of the beginning class
                    ++$i;
                    $date = substr($lines[$i], 8, 8);
                    $hour_start = substr($lines[$i], 17, 2);
                    $hour_start += 1;
                    $min_start = substr($lines[$i], 19, 2);
                    $d = date_create_from_format('Ymd', $date);
                    //echo $d->format('d/m/Y') . ' ' . $hour_start . ':' . $min_start . "</br>";
                    // date and hour of the beginning class
                    ++$i;
                    $hour_end = substr($lines[$i], 15, 2);
                    $hour_end += 1;
                    $min_end = substr($lines[$i], 17, 2);
                    //echo $d->format('d/m/Y') . ' ' . $hour_end . ':' . $min_end . "</br>";
                    // Subjects
                    ++$i;
                    $subject = substr($lines[$i], 8);
                    //echo utf8_decode($subject) . "</br>";
                    // Room
                    ++$i;
                    $room = substr($lines[$i], 9);
                    //echo $room . "</br>";

                    // Teacher's first name and last name
                    ++$i;
                    $full_description = $lines[$i];
                    $first_last_name = explode('\n', $full_description);

                    $parameter = utf8_decode($first_last_name[sizeof($first_last_name)-2]);
                    //Test of existing name
                    $first_carac = substr($first_last_name[sizeof($first_last_name)-2], 0, 1);

                    // If name doesn't exist, print nothing
                    if ($first_carac == "(") {
                        echo '';
                    } // Else save first name and last name
                    else {
                        $full_name = explode(' ', $parameter);

                        //Save first and last name into 2 var
                        $first_name = "";
                        $last_name = "";

                        //on parcours tout les mots (prénom et nom)
                        foreach ($full_name as $v2) {
                            if ($v2 === strtoupper($v2)) { //si ça match, alors c'est un nom de famille (toujours en majuscule)
                                $last_name .= strtolower($v2) . " ";
                            } else {//sinon c'est que c'est un prénom
                                $first_name .= strtolower($v2) . " ";
                            }
                        }

                        //echo ($room . "\n");
                        //si la salle n'est pas spécifié on ne met pas " en ... " dans le mail
                        $room = (!empty($room)) ? ' en ' . $room : $room;

                        //si ça match, alors le cours trouvé appartient au même professeur que le cours précédent, on l'ajout alors dans le même content que le précedent
                        if ($save_first_name == $first_name && $save_last_name == $last_name) {
                            $content .= '<p>De ' . $hour_start . ':' . $min_start . ' à ' . $hour_end . ':' . $min_end . $room . ' pour la matière ' . $subject . '.</p>';
                        } else { // sinon on crée un nouveau content pour le proffesseur suivant
                            $content = '<html>
                            <head>
                              <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                              <title>PHPMailer</title>
                            </head>
                            <body>
                                <div style=" font-family: Arial, Helvetica, sans-serif; font-size: 20px;">
                                  <h1>Rappel enseignement</h1>
                                  <div align="left">
                                    <p>Bonjour ' . ucfirst($first_name) . ' ' . strtoupper($last_name) . ' !</p>
                                    <p>N\'oubliez pas que vous avez cours le ' . $d->format('d/m/Y') . ' de ' . $hour_start . ':' . $min_start . ' à ' . $hour_end . ':' . $min_end . $room . ' pour la matière ' . $subject . '.</p>';
                        }
                    }

                    //on sauvegarde les nom et prénom de ce cours pour les comparer au suivant
                    $save_first_name = $first_name;
                    $save_last_name = $last_name;
                }
            }

            //on ferme le content
            $content .= '</div>
                            </div>
                        </body>
                    </html>';

            echo $content;
            //Create a new PHPMailer instance
            $mail = new PHPMailer;
            //Set who the message is to be sent from
            $mail->From = "noreply@zenetude.esy.es";
            $mail->FromName = "Noreply - Zenetude";
            //Set an alternative reply-to address
            /*$mail->addReplyTo('replyto@example.com', 'First Last');*/
            //Connect to database
            $db = connect();
            $request = $db->query('SELECT user_instituteemail FROM User WHERE LOWER(user_firstname) = "' . $first_name . '" AND LOWER(user_name) = "' . $last_name . '"');
            $results = $request->fetch();
            //Save mail receive
            $mailbd = $results['user_instituteemail'];
            //Set who the message is to be sent to
            $mail->addAddress($mailbd, $first_name . ' ' . $last_name);
            //Set the subject line
            $mail->Subject = 'Rappel enseignement';
            $mail->isHTML(true);
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->Body = file_get_contents('examples/contents.html');
            //Replace the plain text body with one created manually
            $mail->Body = utf8_decode($content);
            //Attach an image file
            //$mail->addAttachment('examples/images/phpmailer_mini.png');
            //Send the message, check for errors
            $envoie = $mail->send();
            if (!$envoie) {
                echo "Mailer Error: " . $mail->ErrorInfo . "</br>";
            } else {
                echo "Message sent!" . "</br>";
            }
        }
    }