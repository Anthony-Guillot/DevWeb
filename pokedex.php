<!DOCTYPE html>
<html>
  <head>
    <title>Premier programme PHP !</title>
    <link rel="stylesheet" href="pokedex.css">
  </head>
  <body>
    <div  id="home">
      <a href="menu.html"><input type="button" value="Menu Principale"></a>
    </div>
    <h1 id="pokedex">Pokedex</h1>
    <div id="recherche">
      <h3 > Recherche d'un pokemon</h3>
      <input type="text"><input type="button" value="rechercher" onclick="">
    </div>
    <?php 
    try{
      $base = new PDO('mysql:host=localhost;dbname=pokemon','guillot','010828');
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    $requete=$base->prepare('select * from pokemon');
    $requete->execute();
    echo '<table>';
    echo '<tr><td class="lignehaut">Image</td><td class="lignehaut">Id</id><td class="lignehaut">Nom</td><td class="lignehaut">PV</td><td class="lignehaut">Attaque</td><td class="lignehaut">Defense</td><td class="lignehaut">Attaque Speciale</td><td class="lignehaut">Defense Speciale</td><td class="lignehaut">Vitesse</td></tr>';
    while($donne=$requete->fetch()){
      echo '<tr><td><img src=image/'.$donne['id'].'.png></td><td>'.$donne['id'].'</td><td>'.$donne['nom'].'</td><td>'.$donne['base_pv'].'</td><td>'.$donne['base_atk'].'</td><td>'.$donne['base_def'].'</td><td>'.$donne['base_atk_spe'].'</td><td>'.$donne['base_def_spe'].'</td><td>'.$donne['base_spd'].'</td></tr>';
    }
    echo '</table>'
    ?>
  </body>
</html>