<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

?>
<div class="menu container col-10">
<nav class="navbar navbar-expand-lg mb-2">
  <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
<a class="nav-link btn btn-warning mr-2 p-1" href="home.php"><i class="fas fa-home"></i>&nbsp;accueil</a>  
<a class="nav-link btn btn-warning p-1" href="addCompetence.php"><i class="fa fa-plus-circle"></i>&nbsp;ajouter une compétence</a>
  <!-- </div> -->
</nav>

<?php

$req = $bdd -> query('SELECT * FROM competence');
$results = $req->fetchAll();

?>
<table class="table table-hover">
  <thead class="thead-dark text-uppercase">
    <tr>
      <!-- <th scope="col">id</th> -->
      <th scope="col">titre</th>
      <th scope="col">note attribuée</th>
      <th class='text-center' colspan='2'>options</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($results as $res){?>
    <tr>
      <td><?= $res['titre']?></td>
      <td><?= $res['note']?></td>
      <td><a title="Editer" href="editCompetence.php?id=<?php echo($res['id']); ?>"><i class="far fa-edit"></i>&nbsp;modifier cette compétence</a></td>
      <td><a title="Supprimer" href="deleteCompetence.php?id=<?php echo($res['id']);?>"><i class="fas fa-trash"></i>&nbsp;supprimer cette compétence</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  
</table>
</div>
