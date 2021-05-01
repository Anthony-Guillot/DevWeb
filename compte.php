<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Compte Pokémon</title>
        <link rel="stylesheet" href="compte.css">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="inscription" method="GET">
            <h1>Inscription</h1>
            <label>Email :<input type="email" placeholder="******@***.**"></label>
            <br>
            <label>Nom :<input type="text" placeholder="Nom"></label>
            <br>
            <label>Date de naissance :<input type="date"></label>
            <br>
            <label>Mot de passe :<input type="password"></label>
            <br>
            <label>Valider le mot de passe :<input type="password"></label>
            <br>
            <input type="submit" value="Inscription" name="inscription">
        </form>
    </body>
</html>