<?php

session_start();

require_once ('include.php');
include ('jumbotron.php');

?>


<!-- affichage du c.v. 'dynamique'
pour l'utilisateur comme pour l'admin  -->

<?php

$req = $bdd -> query('SELECT * FROM experience');
$results = $req->fetchAll();

?>
<div class="menu container col-10">
<table class="table">
  <thead class="thead-dark text-uppercase table-sm">
    <tr>
      <th scope="col">titre</th>
      <th scope="col">description</th>
      <th scope="col">date de début</th>
      <th scope="col">date de fin</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($results as $res){?>
    <tr>
      <td scope="row"><?= $res['titre']?></td>
      <td><?= $res['description']?></td>
      <td width='10%'><?= $res['date_debut']?></td>
      <td><?= $res['date_fin']?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  <caption class='lead text-uppercase'>mes expériences professionnelles</caption>
</table>
</div>

<?php
$req2 = $bdd -> query('SELECT * FROM competence');
$results2 = $req2->fetchAll();

?>

<div class="menu container col-10 mt-4">
<table class="table">
  <thead class="thead-dark text-uppercase table-sm">
    <tr>
      <th scope="col">titre</th>
      <th scope="col">note attribuée</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($results2 as $res2){?>
    <tr>
      <td scope="row"><?= $res2['titre']?></td>
      <td><?= $res2['note']?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  <caption class='lead text-uppercase'>mes compétences</caption>
</table>
</div>
