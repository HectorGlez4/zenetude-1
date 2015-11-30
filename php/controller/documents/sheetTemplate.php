<?php   
/*
include(dirname(__FILE__).'/InteractionBD.php');

$students = getStudentsByTrainingGroup(1,1);
*/
include(dirname(__FILE__).'/students.php');
?>

<style type="text/css">
<!--
table { vertical-align: top;  }
tr    { vertical-align: top; }
td    { vertical-align: bottom; 
		border:1px solid;
		height: 25;
	}
.left{text-align: left;}
.center{text-align: center;}
table {font-size: 16px;}
h4,
h5{margin:0px;}
.centre{margin:0px auto;}
#fleft{float:left;}
#fright{float:right;}
.noneborder td{border:0px;}
.BOLD{font-weight: bold;}
}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" >
    <div style="width:80%; padding:0 75px;">
        <bookmark title="Lettre" level="0" ></bookmark>

        <h4>ANNEE 2015/2016</h4><br>
        <h4 class="center">"Nom de formation"</h4>
        <h5 class="center">"<?php echo count($students)?> ETUDIANTS"</h5><br>
        <table class="noneborder" style="width:100%"><tr><td style="width: 60%"><h4 >ENSEIGNANT :</h4></td><td style="width: 40%"><h4 >DATE</h4></td> </tr> </table>
        <br>
        <h4>Cours: de &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H à
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; H</h4><br>
        <table cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center; ">
            <tr>
                
            </tr>
        </table>
        <table cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center;">
            <tr>
                <td class="left BOLD" style="width: 35%">NOM</td>
                <td class="left BOLD" style="width: 20%">PRENOM</td>
                <td class="center BOLD" style="width: 45%">SIGNATURE</td>
            </tr>

            <?php
            for($iX = 0; $iX<count($students);++$iX)
            {
           	?>
            <tr>
                <td style="width: 35%; text-align: left"><?php echo $students[$iX]["user_name"]; ?></td>
                <td style="width: 20%; text-align: left"><?php echo $students[$iX]["user_firstname"]; ?></td>
                <td style="width: 45%; text-align: right"></td>
            </tr>
            <?php }?>
        </table>
    </div>
</page>
