<?php
    error_reporting(-1);
    ini_set('display_errors', 1);
    // get the HTML
    $groupe = $_POST["groupe"];
    $formation = $_POST["formation"];

    ob_start();
    include(dirname(__FILE__).'/prepareTrombi.php');

    $content = ob_get_clean();

    // convert to PDF
    require_once('../../../vendor/html2pdf/html2pdf.class.php');
try{
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        //$html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('trombinoscope.pdf', 'F');
        echo json_encode([
            'message' => "success",
            'success' => true
        ]);
    }
    catch(HTML2PDF_exception $e) {
        echo json_encode([
            'message' => "erreur",
            'success' => false
        ]);
        echo $e;
        exit;
    }
