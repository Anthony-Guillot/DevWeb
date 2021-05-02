<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="optimisateur.css">
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
        <div id="recherche">
            <form method="get">
                <select class="select" name="stat1">
                    <nom>Statistique1</nom>
                    <option valeur="none">-</option>
                    <option valeur="spd">spd</option>
                    <option valeur="atk">atk</option>
                    <option valeur="def">def</option>
                    <option valeur="pv">pv</option>
                    <option valeur="atk_spe">atk_spe</option>
                    <option valeur="def_spe">def_spe</option>
                </select>
                <select class="select" name='stat2'>
                    <nom>Statistique2</nom>
                    <option valeur="none">-</option>
                    <option valeur="spd">spd</option>
                    <option valeur="atk">atk</option>
                    <option valeur="def">def</option>
                    <option valeur="pv">pv</option>
                    <option valeur="atk_spe">atk_spe</option>
                    <option valeur="def_spe">def_spe</option>
                </select>
                <input id="bouton" type="submit" value="Rechercher">
            </form>
        </div>
            <?php
    try{
      $base = new PDO('mysql:host=localhost;dbname=pokemon','guillot','010828');
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    echo '<table id="l_pokedex"><tr><td class="lignehaut">Image</td><td class="lignehaut">Id</id><td class="lignehaut">Nom</td><td class="lignehaut">PV</td><td class="lignehaut">EV_Attaque</td><td class="lignehaut">EV Defense</td><td class="lignehaut">EV Attaque Speciale</td><td class="lignehaut">EV Defense Speciale</td><td class="lignehaut">EV Vitesse</td></tr>';  
    if(isset($_GET['stat1']) AND !empty($_GET['stat1']))
      {
        $stat1=($_GET['stat1']);
        $stat2=($_GET['stat2']);
        if($stat2=='-'){
            $pokemon=$base->query('select * from pokemon where ev_'.$stat1.'>0 ORDER BY ev_'.$stat1.' DESC');
        }
        else{
            $pokemon=$base->query('select * from pokemon where ev_'.$stat1.'>0 AND ev_'.$stat2.'>0 ORDER BY ev_'.$stat1.' DESC');
        }
        if($pokemon->rowCount() > 0){
          while($donne=$pokemon->fetch()){
            echo '<tr><td  id="image"><img src=image/'.$donne['id'].'.png></td><td>'.$donne['id'].'</td><td>'.$donne['nom'].'</td><td>'.$donne['ev_pv'].'</td><td>'.$donne['ev_atk'].'</td><td>'.$donne['ev_def'].'</td><td>'.$donne['ev_atk_spe'].'</td><td>'.$donne['ev_def_spe'].'</td><td>'.$donne['ev_spd'].'</td></tr>';
          }
        }
      }
      echo '</table>';
    ?>
        </div>
    </body>
</html>