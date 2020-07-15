<?php

include('include.php');

$dev = ['tarik','louatah',33,'dev','examen php cv','12 rue des bierces', '42270 Saint-Priest-En-Jarez'];

?>

<div class="row">
    <div class="container card mt-4 p-0" style="width: 22rem;">
    <?php 
    for ($i=0; $i < count($dev); $i++){
    ?>
        <div class="card-body">
            <p class="card-text"><?php echo($dev[$i]) ?></p>
        </div>
    <?php 
    }
    ?>
    </div>
</div>