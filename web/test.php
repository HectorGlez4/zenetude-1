<?php
/**
 * Created by PhpStorm.
 * User: a14031929
 * Date: 24/11/2015
 * Time: 14:49
 */
?>
<html>

<link rel="stylesheet" href="../css/test.css">
<body>

<form action="valider.php" method="post">
    <fieldset>
        <legend>Inscription</legend>
        <label for="email"> Adresse email <em>*</em></label>
        <input id="email" name="email"  type="email" required=""  ><br>
        <label>Mot de passe: <em>*</em> </label>
        <input id ="passe" type="password"  name="passe"/><br/>
        <label>Confirmation du mot de passe: </label>
        <input type="password" id="passe" name="passe2"/><br/>
        <p><input value="S'inscrire" type="submit"></p>
    </fieldset>

</form>

</body>


</html>