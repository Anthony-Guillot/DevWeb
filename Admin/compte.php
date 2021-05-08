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
        <form action="" id="idisnc" method="POST">
            <h1>Inscription</h1>
            <label class="label">Email :<br><input class="text" type="email" name="mail" placeholder="******@***.**"></label>
            <br>
            <label class="label">Nom :<br><input class="text" type="text" name="pseudo" placeholder="Nom"></label>
            <br>
            <label class="label">Mot de passe :<br><input class="text" type="password" name="mdp1" ></label>
            <br>
            <label class="label">Valider le mot de passe :<br><input class="text" type="password" name="mdp2"></label>
            <br>
            <input id="bouton" type="submit" value="Inscription" name="inscription" >
        </form>
        <form action="" id="idco" method="POST">
            <h1>Connexion</h1>
            <label class="label">Email :<br><input class="text" type="email" name="logmail" placeholder="******@***.**"></label>
            <br>
            <label class="label">Mot de passe :<br><input class="text" type="password" name="logmdp" ></label>
            <br>
            <input id="bouton" type="submit" value="Connexion" name="connexion" >
        </form>
        <?php 
            try{
                $base = new PDO('mysql:host=localhost;dbname=users','guillot','010828');
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            if(isset($_POST['inscription'])){
                if(!empty($_POST['mail']) && !empty($_POST['pseudo']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2'])){
                    $mail=htmlspecialchars($_POST['mail']);
                    $pseudo=htmlspecialchars($_POST['pseudo']);
                    $mdp1=sha1($_POST['mdp1']);
                    $mdp2=sha1($_POST['mdp2']);
                    if($mdp1==$mdp2){
                        $requete=$base->prepare("INSERT INTO user (nom,mail,mdp) VALUES (?,?,?)");
                        $requete->execute(array($pseudo,$mail,$mdp1));
                        header("location: http://localhost/DevWeb/Inscris.html");
                    }
                    else{
                        echo "<script>alert('les mots de passes ne correspondent pas')</script>";
                    }
                }
                else{
                    echo "<script>alert('Merci de remplir toutes les cases')</script>";
                }

            }
            if(isset($_POST['connexion'])){
                    $mail=htmlspecialchars($_POST['logmail']);
                    $mdp=sha1($_POST['logmdp']);
                    $verif->query('select * from user where mail LIKE '.$mail.'');
                    if($verif->rowCount()!=1){
                        echo "<script>alert('Pas de compte trouvé')</script>";
                    }
                    else{
                        $donne=$verif->fetch();
                        if($mdp = $donne['mdp']){
                            echo "<script>alert('Bonne connexion')</script>";
                        }
                        else{
                            echo "<script>alert('Mot de passe incorrect')</script>";
                        }
                    }

            }
            ?>
    </body>
</html>