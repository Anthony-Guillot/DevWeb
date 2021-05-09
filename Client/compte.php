<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Compte Pokémon</title>
        <link rel="stylesheet" href="compte.css">
    </head>
    <body>
        <h1>
        Pokalculator
        </h1>
        <table>
            <tr class="liste">
                <td class="liste">
                    <a href="menu.html">Acceuil</a>
                </td>
                <td class="liste">
                    <a href="pokedex.php">Pokedex</a>
                </td>
                <td class="liste">
                    <a href="optimisateur.php">Optimisateur d'EV</a>
                </td>
                <td class="liste">
                    <a href="explication.html">Explication</a>
                </td>
                <td class="liste">
                    <a href="compte.php">Mon compte pokemon</a>
                </td>
            </tr>
        </table>
        <form action="" id="inscription" method="POST">
            <input id="deconnection" type="submit" value="Deconnection" name="deco">
        </form>
        <?php 
            try{
                $base = new PDO('mysql:host=localhost;dbname=users','guillot','010828');
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            if(isset($_POST['deco'])){
                session_destroy();
                header("location: http://localhost/DevWeb/menu.html");
            }
            ?>
    </body>
</html>