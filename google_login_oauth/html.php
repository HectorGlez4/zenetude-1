<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Google OAuth in PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
  </head>
  <body>

      <h2>Welcome to a Google OAuth PHP example.</h2>
      <hr />
      
    <p>
      <pre>
        <?php
            print_r($content);
            //if ($dataGoogle){
                echo $content['name'];
            //}

            if (($content) && ($_SESSION['isConnectGoogle'])){
                echo "<a href='?logout=true'>Se déconnecter</a>";
            }
        ?>

      </pre>
    </p>

  </body>
</html>
