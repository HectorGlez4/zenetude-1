<?php   
include(dirname(__FILE__).'/students.php');
?>

<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: bottom; 
		border:1px solid;
		height: 25;
	}
.left{text-align: left;}
.center{text-align: center;}
table {font-size: 16px;}
}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" >
    <bookmark title="Lettre" level="0" ></bookmark>
    
    <h1>Licence Professionnelle SIL DA2I 2015-2016</h1>
    <br><br><hr><br><br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center; ">
        <tr>
            <th class="left" style="width: 30%">Nom</th>
            <th class="left" style="width: 20%">Prénom</th>
            <th class="center" style="width: 50%">Signature</th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center;">
        <?php
        for($iX = 0; $iX<count($students) - 1;++$iX)
        {
       	?>
        <tr>
            <td style="width: 30%; text-align: left"><?php echo $students[$iX][0]; ?></td>
            <td style="width: 20%; text-align: left"><?php echo $students[$iX][1]; ?></td>
            <td style="width: 50%; text-align: right"></td>
        </tr>
        <?php }?>
    </table>
</page>