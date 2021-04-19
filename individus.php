<?php
include 'accesBDDMedicament.php';
if(isset($_POST) && !empty($_POST["code"])) {
        deleteIndividu($_POST["code"]);
    }
if (isset($_POST) && !empty($_POST["CodeGRP"]) && !empty($_POST["LibelleGRP"]) ) {
  insertIndividu($_POST['CodeGRP'],$_POST['LibelleGRP']);
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
    <table class="table table-bordered" >
    <thead >
        <tr class="table-primary">
        <th scope="col">Code</th>
        <th scope="col">Libelle</th>
        <th scope="col">Nb prescriptions</th>
        <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
      <?php $LesIndividus = getLesIndividus(); 
      foreach ($LesIndividus as $individu) {
       ?>
       <tr>
         <td> <?php echo $individu['TIN_CODE'] ?> </td>
         <td> <?php echo $individu['TIN_LIBELLE'] ?> </td>
         <td> <?php $nb = getNbPrescription($individu['TIN_CODE']);
                    echo $nb['count(PRE_POSOLOGIE)']; ?> </td>
         <td>
         <form method="POST">
                    <input type="hidden" name="code" value="<?= $individu['TIN_CODE']?>">
                    <button class="btn btn-outline-secondary" type="submit">Supprimer</button>
         </form>
        </td>   
        </tr>
        </tr> 
       <?php
      }
      ?>
    </tbody>
  </table>

  <h1 class="text-center">Pour ajouter un Groupe d'individu : </h1>
<form class="col-lg-6 offset-lg-3" method="POST">
  <div class="text-center">
    <label for="CodeGRP">Code du groupe</label>
    <input type="text" class="form-control" name="CodeGRP" placeholder="ADLT" required="true">
  </div>
  <div class="text-center">
    <label for="LibelleGRP">Libelle du groupe</label>
    <input type="text" class="form-control" name="LibelleGRP" placeholder="Personne agée entre 12 et 60 ans" required="true">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Créer</button>
  </div>
   
</form>
</body>
</html>
