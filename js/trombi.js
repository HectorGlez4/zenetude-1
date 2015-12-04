/**
 * Created by v13000737 on 03/12/15.
 */


function actualiserTrombi(formation,groupe){
    $.ajax({
        url: '../controller/documents/generateTrombi.php',
        type: 'POST',
        data: 'formation='+formation+'&groupe='+groupe,
        dataType: 'json',
        success: function (JsonData, statut){
            if(JsonData.message=="success")
            {
                var html = '<iframe src="../controller/documents/trombinoscope.pdf" width="100%" height="800px" ></iframe>';
                $('#trombi').html(html);
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