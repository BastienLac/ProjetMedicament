<?php
include 'accesBDDMedicament.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>accueil.php</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
 <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
      <a class="navbar-brand" href="accueil.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="medicaments.php">Les médicaments <span class="sr-only">(current)</span></a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="individus.php">Les Individus <span class="sr-only">(current)</span></a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="prescrire.php">Prescrire <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <a class="navbar-brand">
          <img src="logo.PNG" width="40" height="40" alt="">
        </a>
      </div>
    </nav>
     <h1 class="text-center">Quelques Statistiques : </h1>
     <?php
     $max = 0; $nbM = 0;$lesMedicaments = getLesMedicaments(); 
     foreach($lesMedicaments as $medicament) {
       $nb = getLesPrescriptionsParMedoc($medicament['MED_DEPOTLEGAL']);
       $nbM++;
       if($nb > $max){
        $max = $nb;
        $Nom = $medicament['MED_NOMCOMMERCIAL'];
       }
     }
     ?>
     <h6>-Nombre de médicament : </h6> <?php echo '<p style="color:#E64D27;">'.$nbM ?>
     <h6>-Médicament le plus prescrit : </h6> <?php echo '<p style="color:#E64D27;">'.$Nom.", ".$max['count(PRE_POSOLOGIE)']." prescriptions"; ?>
      <?php
       $lesMedicaments = getLesMedicaments(); 
     foreach ($lesMedicaments as $medicament) {
       $nb = getLesPrescriptionsParMedoc($medicament['MED_DEPOTLEGAL']);
       if($nb < $max){
         $max = $nb;
         $Nom = $medicament['MED_NOMCOMMERCIAL'];
       }
     }
     
     ?>
     <h6>-Médicament le moins prescrit : </h6> <?php echo '<p style="color:#E64D27;">'.$Nom.", ".$max['count(PRE_POSOLOGIE)']." prescriptions"; ?>
</body>
</html>