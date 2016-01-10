/**
 * Created by v13000737 on 03/12/15.
 */

/**
 * Display the wanted trombinoscope on document.php using AJAX
 * @param formation int contains the training id
 * @param groupe int contains the student group
 */
function actualiserTrombi(formation,groupe){
    $.ajax({
        url: '../controller/generatetrombi.php',
        type: 'POST',
        data: 'formation='+formation+'&groupe='+groupe,
        dataType: 'json',
        success: function (JsonData, statut){

            if(JsonData.message=="success")
            {
                var html = '<iframe src="trombinoscope'+formation+'_'+groupe+'.pdf" width="100%" height="800px" ></iframe>';
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

/**
 * Open a new tab with the wanted pdf document for printing
 * @param doc string contains "trombi" or "sheet" according to the wanted document
 * @param formation int contains the training id
 * @param groupe int contains the student group
 */
function imprimerDoc(doc, formation, groupe){
    if(doc == 1)
    {
        doc = "trombi";
        var url = "trombinoscope"+formation+"_"+groupe+".pdf";
    }
    else if(doc == 2)
    {
        doc = "sheet";
        var url = "feuille_emargement"+formation+"_"+groupe+".pdf";
    }
    else
        alert("error: unknown document");
    $.ajax({
        url: '../controller/generate'+doc+'.php',
        type: 'POST',
        data: 'formation='+formation+'&groupe='+groupe,
        dataType: 'json',
        success: function (JsonData, statut){
            if(JsonData.message=="success")
            {
                window.open(url, '_blank');
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