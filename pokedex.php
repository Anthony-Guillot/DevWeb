<!DOCTYPE html>
<html>
  <head>
    <title>Premier programme PHP !</title>
    <link rel="stylesheet" href="pokemon.css">
  </head>
  <body>
    <?php 
    try{
      $base = new PDO('mysql:host=localhost;dbname=pokemon','guillot','010828');
      echo "connecté a la bdd";
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    $requete=$base->prepare('select * from pokemon');
    $requete->execute();
    echo '<table>';
    echo '<tr><td></td><td>Id</id><td>Nom</td><td>PV</td><td>Attaque</td><td>Defense</td><td>Attaque Speciale</td><td>Defense Speciale</td><td>Vitesse</td></tr>';
    while($donne=$requete->fetch()){
      echo '<tr><td><img src=image/'.$donne['id'].'.png></td><td>'.$donne['id'].'</td><td>'.$donne['nom'].'</td><td>'.$donne['base_pv'].'</td><td>'.$donne['base_atk'].'</td><td>'.$donne['base_def'].'</td><td>'.$donne['base_atk_spe'].'</td><td>'.$donne['base_def_spe'].'</td><td>'.$donne['base_spd'].'</td></tr>';
    }
    echo '</table>'
    ?>
  </body>
</html>