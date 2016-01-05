<link type="text/css" rel="stylesheet" href="../../css/trombi.css"/>

<?php

include(dirname(__FILE__).'/../model/documentsmodel.php');

$students = getStudentsByTrainingGroup($formation,$groupe);
$ns = count($students);

//include(dirname(__FILE__).'/students.php');
?>

<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" >
    <div style="width:100%;margin:0 auto;">
        <bookmark title="Lettre" level="0" ></bookmark>

        <h2><?php echo $students[0]["description"]; ?> 2015-2016</h2>
        <h3>Département: <?php echo $students[0]["departement_name"] ?></h3>
        <br><hr><br>
        <h5><?php echo $ns ?> étudiants</h5>
        <table cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center; ">
            <tr style="height:3cm;width:100%;">
            <?php
                for($iX = 0; $iX < $ns;++$iX)
                {
                    if ($iX % 5 == 0 && $iX != 0)
                    { ?>
                        </tr>
                        <tr style="height:3cm;width:100%;">
                    <?php }
            ?>
                <td style="width: 16%;height:3cm;">
                    <img src="<?php if(isset($students[$iX]["student_trombi"]) && file_exists($students[$iX]["student_trombi"]))
                                    {
                                        echo $students[$iX]["student_trombi"];
                                    } else echo "../../img/avatar/avatar.png" ?>" alt="trombi"  style="height:140px;">
                    <p><?php echo utf8_encode($students[$iX]["user_name"]) . "<br/>" .
                     utf8_encode($students[$iX ]["user_firstname"]); ?></p>
                </td>

            <?php
                }
            ?>
            </tr>
        </table>
    </div>
</page>
