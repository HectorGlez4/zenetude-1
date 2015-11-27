<?php
    
    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/feuilleTemplate.php');

    $content = ob_get_clean();

    // convert to PDF
    require_once('./html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('feuille_d\'emargement.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }