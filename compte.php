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
        <form action="" id="idinsc" method="POST">
            <h1>Inscription</h1>
            <label class="label">Email :<br><input class="text" type="email" name="mail" placeholder="******@***.**"></label>
            <br>
            <label class="label">Nom :<br><input class="text" type="text" name="pseudo" placeholder="Nom"></label>
            <br>
            <label class="label">Mot de passe :<br><input class="text" type="password" name="mdp1" ></label>
            <br>
            <label class="label">Valider le mot de passe :<br><input class="text" type="password" name="mdp2"></label>
            <br>
            <input id="bouton" type="submit" value="Inscription" name="subinscription" >
        </form>
        <form action="" id="idco" method="POST">
            <h1>Connexion</h1>
            <label class="label">Email :<br><input class="text" type="email" name="logmail" placeholder="******@***.**"></label>
            <br>
            <label class="label">Mot de passe :<br><input class="text" type="password" name="logmdp" placeholder="*******"></label>
            <br>
            <input id="bouton" type="submit" value="Connexion" name="subconnexion" >
        </form>
        <?php 
            try{
                $base = new PDO('mysql:host=localhost;dbname=users','guillot','010828');
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            if($_POST['subinscription']){
                if(!empty($_POST['mail']) && !empty($_POST['pseudo']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2'])){
                    $mail=htmlspecialchars($_POST['mail']);
                    $pseudo=htmlspecialchars($_POST['pseudo']);
                    $mdp1=sha1($_POST['mdp1']);
                    $mdp2=sha1($_POST['mdp2']);
                    $ad="0";
                    if($mdp1==$mdp2){
                        $requete=$base->prepare("INSERT INTO user (nom,mail,mdp,ad) VALUES (?,?,?,?)");
                        $requete->execute(array($pseudo,$mail,$mdp1,$ad));
                        header("location: http://localhost/DevWeb/Client/Inscris.html");
                    }
                    else{
                        echo "<script>alert('les mots de passes ne correspondent pas')</script>";
                    }
                }
                else{
                    echo "<script>alert('Merci de remplir toutes les cases')</script>";
                }

            }
            else if($_POST['subconnexion']){
                if(!empty($_POST['logmail']) && !empty($_POST['logmdp'])){
                    $logmail=htmlspecialchars($_POST['logmail']);
                    $logmdp=sha1($_POST['logmdp']);
                    $user=$base->query('select * from user where mail like "'.$logmail.'"');
                    if($user->rowCount()==1){
                        $donne=$user->fetch();
                        if($logmdp == $donne['mdp']){
                            if($donne['ad']==0){
                                header("location: http://localhost/DevWeb/Client/menu.html");
                            }
                            else if($donne['ad']==1){
                                header("location: http://localhost/DevWeb/Admin/menu.html");
                            }
                        }
                        else{
                            echo "<script>alert('Erreur mot de passe')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Erreur authentification')</script>";
                    }
                }
                else{
                    echo "<script>alert('Merci de remplir toutes les cases')</script>";
                }
            }
            ?>
    </body>
</html>
