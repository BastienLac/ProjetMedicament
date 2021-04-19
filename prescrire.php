<?php
include 'accesBDDMedicament.php';

if (isset($_POST) && !empty($_POST["MedPRESC"]) && !empty($_POST["IndividuPRESC"]) && !empty($_POST["DosagePRESC"]) ) {
  insertPrescription($_POST['MedPRESC'],$_POST['IndividuPRESC'],$_POST['DosagePRESC'],$_POST['PosologiePRESC']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>individus.php</title>

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

    <h1 class="text-center">Pour prescrire un médicament : </h1>
  <form class="col-lg-6 offset-lg-3" method="POST">
  <div class="text-center">
    <label for="MedPRESC">Choisissez un médicament à prescrire</label>
    <select class="form-control" name="MedPRESC">
      <?php $lesMedicaments = getLesMedicaments();
      foreach ($lesMedicaments as $medicament) {
        ?>
        <option value="<?=$medicament['MED_DEPOTLEGAL']?>"> <?php echo $medicament['MED_NOMCOMMERCIAL'] ?> </option>
        <?php
      }
      ?>
    </select>
  </div>
  <div class="text-center">
    <label for="IndividuPRESC">Puis choisissez un type d'individu</label>
    <select class="form-control" name="IndividuPRESC">
      <?php $lesIndividus = getLesIndividus();
      foreach ($lesIndividus as $individu) {
        ?>
        <option value="<?=$individu['TIN_CODE']?>"> <?php echo $individu['TIN_LIBELLE'] ?> </option>
        <?php
      }
      ?>
    </select>
  </div>
  <div class="text-center">
    <label for="DosagePRESC">Choisissez un dosage correspondant</label>
    <select class="form-control" name="DosagePRESC">
      <?php $lesDosages = getLesDosages();
      foreach ($lesDosages as $dosage) {
        ?>
        <option value="<?=$dosage['DOS_CODE']?>"> <?php echo $dosage['DOS_QUANTITE'] ?> </option>
        <?php
      }
      ?>
    </select>
  </div>
    <div class="text-center">
    <label for="PosologiePRESC">Choisissez enfin la fréquence à prendre</label>
    <input type="text" class="form-control" name="PosologiePRESC" placeholder="3 par jour" required="true">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Prescrire</button>
  </div>
   
</form>
   </body>
   </html>