<?php   

include(dirname(__FILE__).'/InteractionBD.php');

$students = getStudentsByTrainingGroup(1,1);

//include(dirname(__FILE__).'/students.php');
?>

<style type="text/css">
<!--
td    { vertical-align: bottom; 
		border:1px solid;
		height: 25;
	}
table {font-size: 16px;}
h3
h2{margin:0 auto;}
p{font-size: 10px;  
    margin-top: 5px;}

}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" >
    <div style="width:100%;margin:0 auto;">
        <bookmark title="Lettre" level="0" ></bookmark>

        <h2>"Nom de Formation" 2015-2016</h2>
        <h3>Département "Nom Département"</h3>
        <br><hr><br>
        "Nombres d'éléves"
        <table cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center; ">
            <tr style='height:3cm;width:100%;'>
            <?php
                $ns = count($students);
                for($iX = 0; $iX < $ns;++$iX)
                {
                    if ($iX % 6 == 0 && $iX != 0)
                    {
                        echo "</tr>";
                        echo "<tr style='height:3cm;width:100%'>";
                    }
            ?>
                <td style="width: 16%;height:3cm;">
                    <img src="../../../../img/avatar/<?php echo $students[$iX]["student_avatar"] ?>" alt="trombi"  style="height:140px;">
                    <p ><?php echo $students[$iX]["user_name"] . "<br/>" .
                     $students[$iX ]["user_firstname"]?></p>
                </td>

            <?php
                }
            ?>
            </tr>
        </table>
    </div>
</page>
