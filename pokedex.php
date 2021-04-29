<!DOCTYPE html>
<html>
  <head>
    <title>Premier programme PHP !</title>
    <link rel="stylesheet" href="pokedex.css">
  </head>
  <body>
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
    echo '<style>
    @font-face{
      font-family:pixel;
      src:url("upheavtt.ttf");    
    }
    @font-face{
      font-family:pokemon;
      src:url("Ketchum.otf");    
    }
    #recherche{
      text-align: center;
    }
    .lignehaut{
      background-color: #e5324d;
      font-size:x-large;
      text-decoration:underline;
      color:#fff;
    }
    #pokedex{
      text-align:center;
      font-family:pokemon;
      font-size:500%;
    }
    table{
      width:75%;
      height:75%;
      margin-left:auto;
      margin-right:auto;
      margin-top:20px;
      border-radius:10px;
      border-spacing:6px;
      background-color:#e5324d;
    }
    td,tr{
      font-family:pixel;
      font-size:large;
      text-align:center;
      border:solid 1px;
      background-color: #eee;
  }

  body{
      background-color: #ccc;
      background-size:contain;
      background-image:url("https://img.freepik.com/vecteurs-libre/abstrait-bleu-formes-geometriques_1035-17545.jpg?size=626&ext=jpg");
  }</style>';
    echo '<table>';
    echo '<tr><td class="lignehaut">Image</td><td class="lignehaut">Id</id><td class="lignehaut">Nom</td><td class="lignehaut">PV</td><td class="lignehaut">Attaque</td><td class="lignehaut">Defense</td><td class="lignehaut">Attaque Speciale</td><td class="lignehaut">Defense Speciale</td><td class="lignehaut">Vitesse</td></tr>';
    while($donne=$requete->fetch()){
      echo '<tr><td><img src=image/'.$donne['id'].'.png></td><td>'.$donne['id'].'</td><td>'.$donne['nom'].'</td><td>'.$donne['base_pv'].'</td><td>'.$donne['base_atk'].'</td><td>'.$donne['base_def'].'</td><td>'.$donne['base_atk_spe'].'</td><td>'.$donne['base_def_spe'].'</td><td>'.$donne['base_spd'].'</td></tr>';
    }
    echo '</table>'
    ?>
  </body>
</html>