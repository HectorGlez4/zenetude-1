<?php
    // get the HTML
    $groupe = $_POST["groupe"];
    $formation = $_POST["formation"];

    ob_start();
    include(dirname(__FILE__).'/../view/preparetrombi.php');

    $content = ob_get_clean();

    // convert to PDF
    require_once('../../vendor/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        //$html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('../view/trombinoscope.pdf', 'F');
        header('Cache-Control: no-cache, must-revalidate');
   	    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode([
            'message' => "success",
            'success' => true
        ]);
    }
    catch(HTML2PDF_exception $e) {
		header('Cache-Control: no-cache, must-revalidate');
   	    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode([
            'message' => "erreur",
            'success' => false
        ]);
        echo $e;
        exit;
    }
