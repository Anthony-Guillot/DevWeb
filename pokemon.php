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
    <?php
    session_start();
    try{
        $base = new PDO('mysql:host=localhost;dbname=pokemon','guillot','010828');
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
      $pokemon=$_GET['nom'];
      $requete=$base->query("SELECT * FROM pokemon WHERE nom = '$pokemon'");
      $donne=$requete->fetch();
    echo "<table id='l_pokemon'>";
    echo "<tr>";
    echo "<td>".$donne['nom']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><img src='image/".$donne['id'].".png'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><img src='image/".$donne['type1'].".png'>    ";
    if($donne['type2']!="none")
    {
        echo "<img src='image/".$donne['type2'].".png'>";
    }
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Statistique :
    <ul>
      <li>PV : ".$donne['base_pv']."</li>
      <li>Attaque : ".$donne['base_atk']."</li>
      <li>Defense : ".$donne['base_def']."</li>
      <li>Attaque Spéciale : ".$donne['base_atk_spe']."</li>
      <li>Défense Spéciale : ".$donne['base_def_spe']."</li>
      <li>Vitesse : ".$donne['base_spd']."</li>
    </ul></td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <?php
            session_start();
            if(isset($_POST['deco'])){
                session_destroy();
                header("location: http://localhost/DevWeb/menu.php");
            }
            ?>
  </body>
</html>