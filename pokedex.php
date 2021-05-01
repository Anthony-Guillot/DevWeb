<!DOCTYPE html>
<html>
  <head>
    <title>Premier programme PHP !</title>
    <link rel="stylesheet" href="pokedex.css">
  </head>
  <body>
  <h1>
        Pokalculator
        </h1>
        <table>
            <tr>
                <td>
                    <a href="menu.html">Acceuil</a>
                </td>
                <td>
                    <a href="pokedex.php">Pokedex</a>
                </td>
                <td>
                    <a href="optimisateur.html">Optimisateur d'EV</a>
                </td>
                <td>
                    <a href="explication.html">Explication</a>
                </td>
                <td>
                    <a href="compte.php">Mon compte pokemon</a>
                </td>
            </tr>
        </table>
        <div id="recherche">
          <form method="GET">
            <label id="recherche-label">Recherche : <input id="recherche-texte" type="search" name="search"><input id="recherche-button" type="submit" value="rechercher"></label>
          </form>
        </div>
    <?php
    try{
      $base = new PDO('mysql:host=localhost;dbname=pokemon','guillot','010828');
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    $requete=$base->query('select * from pokemon');
    echo '<table id="l_pokedex">';
    echo '<tr><td class="lignehaut">Image</td><td class="lignehaut">Id</id><td class="lignehaut">Nom</td><td class="lignehaut">PV</td><td class="lignehaut">Attaque</td><td class="lignehaut">Defense</td><td class="lignehaut">Attaque Speciale</td><td class="lignehaut">Defense Speciale</td><td class="lignehaut">Vitesse</td></tr>';
    if(isset($_GET['search']) AND !empty($_GET['search']))
    {
      $search = ($_GET['search']);
      $pokemon=$base->query('select * from pokemon where nom like "%'.$search.'%"');
      if($pokemon->rowCount() > 0){
        while($donne=$pokemon->fetch()){
          echo '<tr><td  id="image"><img src=image/'.$donne['id'].'.png></td><td>'.$donne['id'].'</td><td>'.$donne['nom'].'</td><td>'.$donne['base_pv'].'</td><td>'.$donne['base_atk'].'</td><td>'.$donne['base_def'].'</td><td>'.$donne['base_atk_spe'].'</td><td>'.$donne['base_def_spe'].'</td><td>'.$donne['base_spd'].'</td></tr>';
        }
      }
    }
    else{
      while($donne=$requete->fetch()){
        echo '<tr><td  id="image"><img src=image/'.$donne['id'].'.png></td><td>'.$donne['id'].'</td><td>'.$donne['nom'].'</td><td>'.$donne['base_pv'].'</td><td>'.$donne['base_atk'].'</td><td>'.$donne['base_def'].'</td><td>'.$donne['base_atk_spe'].'</td><td>'.$donne['base_def_spe'].'</td><td>'.$donne['base_spd'].'</td></tr>';
      }
    }
    echo '</table>';
    ?>
  </body>
</html>