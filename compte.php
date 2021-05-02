<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Compte Pokémon</title>
        <link rel="stylesheet" href="compte.css">
    </head>
    <body>
        <form action="" id="inscription" method="POST">
            <h1>Inscription</h1>
            <label>Email :<input type="email" name="mail" placeholder="******@***.**"></label>
            <br>
            <label>Nom :<input type="text" name="pseudo" placeholder="Nom"></label>
            <br>
            <label>Mot de passe :<input type="password" name="mdp1" ></label>
            <br>
            <label>Valider le mot de passe :<input type="password" name="mdp2"></label>
            <br>
            <input type="submit" value="Inscription" name="inscription" >
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
                    }
                    else{
                        alert("les mots de passes ne correspondent pas");
                        header("location: http://localhost/DevWeb/menu.html");
                    }
                }
                else{
                        alert("Merci de remplir toutes les cases");
                }

            }
            ?>
    </body>
</html>