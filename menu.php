<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pokalculator</title>
        <link rel="stylesheet" href="menu.css">
    </head>
    <body>
        <h1>
            Pokalculator
        </h1>
        <?php
        session_start();
        if($_SESSION['role']=="admin" || $_SESSION['role']=="client"){
        echo '<form action="" id="deco" method="POST">';
        echo '<input id="deco" type="submit" value="Deconnection" name="deco"></form>';
        }
            ?>
        <table>
            <tr class="liste">
                <td class="liste">
                    <a href="menu.php">Acceuil</a>
                </td>
                <td class="liste">
                    <a href="pokedex.php">Pokedex</a>
                </td>
                <td class="liste">
                    <a href="optimisateur.php">Optimisateur d'EV</a>
                </td>
                <td class="liste">
                    <a href="explication.php">Explication</a>
                </td>
                <td class="liste">
                    <a href="compte.php">Mon compte pokemon</a>
                </td>
            </tr>
        </table>
            <ul id="sommaire">
                <li>Pokedex : Présentation des pokémons contenant leurs noms, leurs statistiques ainsi que leurs types</li>
                <br>
                <li>Optimisateur d'EV : Il permet de vous donner la liste des pokemon a combattre pour augmenter une statistique précise, il vous fera gagner de nombreuses minutes.</li>
                <br>
                <li>Explications : Comme son nom l'indique, vous donne des explications sur les termes techniques utilisé à travers ce site pour les nouveaux joueurs s'interessant a la strategie.</li>
                <br>
                <li>Mon compte pokemon : Vous permet de gerer votre équipe de pokemon pour vous rappeler de votre évolution dans le jeu.</li>
            </ul>
            <?php
            session_start();
            if(isset($_POST['deco'])){
                session_destroy();
                header("location: http://localhost/DevWeb (copie)/menu.php");
            }
            ?>
    </body>
</html>
