/**
 * Created by v13000737 on 03/12/15.
 */


function actualiserTrombi(formation,groupe){
    $.ajax({
        url: '../controller/generateTrombi.php',
        type: 'POST',
        data: 'formation='+formation+'&groupe='+groupe,
        dataType: 'json',
        success: function (JsonData, statut){

            if(JsonData.message=="success")
            {
                var html = '<iframe src="trombinoscope.pdf" width="100%" height="800px" ></iframe>';
                $('#trombi').html(html);
                $('.form-active').removeClass("form-active");
                $('#form-'+formation+'_group-'+groupe).addClass("form-active");

                var html2 = '<p><a onclick="imprimerDoc(1,'+formation+','+groupe+');" href="#">Imprimer le trombinoscope</a></p>';
                html2 += '<p><a onclick="imprimerDoc(2,'+formation+','+groupe+');" href="#">Imprimer la feuille d\'émargement</a></p>';
                $('#docchoice').html(html2);
            }
            else
            {
                alert("Erreur: veuillez contacter le support");
            }
        },
        error: function (resultat, statut, erreur){
            alert("error");
        }

    });
}
//../controller/documents/generateTrombi.php?f=<?php echo $frm ?>&g=<?php echo $grp ?>
//../controller/documents/generateSheet.php?f=<?php echo $frm ?>&g=<?php echo $grp ?>

function imprimerDoc(doc, formation, groupe){
    if(doc == 1)
    {
        doc = "Trombi";
        var url = "trombinoscope.pdf";
    }
    else if(doc == 2)
    {
        doc = "Sheet";
        var url = "feuille_emargement.pdf";
    }
    $.ajax({
        url: '../controller/generate'+doc+'.php',
        type: 'POST',
        data: 'formation='+formation+'&groupe='+groupe,
        dataType: 'json',
        success: function (JsonData, statut){
            if(JsonData.message=="success")
            {
                window.open(url);
            }
            else
            {
                alert("Erreur: veuillez contacter le support");
            }
        },
        error: function (resultat, statut, erreur){
            alert("error");
        }

    });
}