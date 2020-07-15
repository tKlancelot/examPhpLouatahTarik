<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

?>
<div class="menu container col-10">
<nav class="navbar navbar-expand-lg mb-2">
  <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
<a class="nav-link btn btn-warning mr-2 p-1" href="home.php"><i class="fas fa-home"></i>&nbsp;accueil</a>  
<a class="nav-link btn btn-warning p-1" href="addExperience.php"><i class="fa fa-plus-circle"></i>&nbsp;ajouter une expérience</a>
  <!-- </div> -->
</nav>


<?php

$req = $bdd -> query('SELECT * FROM experience');
$results = $req->fetchAll();

?>
<table class="table table-hover">
  <thead class="thead-dark text-uppercase table-sm">
    <tr>
      <!-- <th scope="col">id</th> -->
      <th scope="col">titre</th>
      <th scope="col">description</th>
      <th scope="col">date de début</th>
      <th scope="col">date de fin</th>
      <th class='text-center' colspan='2'>options</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($results as $res){?>
    <tr>
      <!-- <th scope="row"></th> -->
      <td><?= $res['titre']?></td>
      <td><?= $res['description']?></td>
      <td><?= $res['date_debut']?></td>
      <td><?= $res['date_fin']?></td>
      <td><a title="Editer" href="editExperience.php?id=<?php echo($res['id']); ?>"><i class="far fa-edit"></i>&nbsp;modifier cette expérience</a></td>
      <td><a title="Supprimer" href="deleteExperience.php?id=<?php echo($res['id']);?>"><i class="fas fa-trash"></i>&nbsp;supprimer cette expérience</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  
</table>
</div>
