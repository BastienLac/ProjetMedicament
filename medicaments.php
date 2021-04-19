<?php
include 'accesBDDMedicament.php';
if(isset($_POST) && !empty($_POST["code"])) {
        deleteMedicament($_POST["code"]);
    }
if (isset($_POST) && !empty($_POST["CodeMED"]) && !empty($_POST["NomMED"]) ) {
  insertMedicament($_POST['CodeMED'],$_POST['NomMED'],$_POST['FamMED'],$_POST['CompoMED'],$_POST['EffetsMED'],$_POST['ContreIndicsMED'],$_POST['PrixMED']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>accueil.php</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
    <?php
   
    ?>
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
        <th scope="col">Nom</th>
        <th scope="col" width="20%">Effets</th>
        <th scope="col" width="25%">ContreIndications</th>
        <th scope="col">Composition</th>
        <th scope="col">Famille</th>
        <th scope="col">Perturbé par :</th>
        <th scope="col">Perturbe :</th>
        <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
      <?php $lesMedicaments = getLesMedicaments(); 
      foreach ($lesMedicaments as $medicament) {
       ?>
       <tr>
         <td> <?php echo $medicament['MED_DEPOTLEGAL'] ?> </td>
         <td> <?php echo $medicament['MED_NOMCOMMERCIAL'] ?> </td>
         <td> <?php echo $medicament['MED_EFFETS'] ?> </td>
         <td> <?php echo $medicament['MED_CONTREINDIC'] ?> </td>
         <td> <?php echo $medicament['MED_COMPOSITION'] ?> </td>
         <td> <?php echo $medicament['FAM_CODE'] ?> </td>
         <td> <?php $lesPerturbateurs = getLesPerturbePar($medicament['MED_DEPOTLEGAL']);
                    foreach ($lesPerturbateurs as $perturbateur) {
                             echo $perturbateur['MED_PERTURBATEUR']." ";
                           } ?> </td>
        <td> <?php $lesPerturbateurs = getLesPerturbe($medicament['MED_DEPOTLEGAL']);
                    foreach ($lesPerturbateurs as $perturbateur) {
                             echo $perturbateur['MED_PERTURBE']." ";
                           } ?> </td>
        <td>
         <form method="POST">
                    <input type="hidden" name="code" value="<?= $medicament['MED_DEPOTLEGAL']?>">
                    <button class="btn btn-outline-secondary" type="submit">Supprimer</button>
                </form>
        </td>     
       </tr>
       <?php
      }
      ?>
    </tbody>
  </table>
<h1 class="text-center">Pour ajouter un médicament : </h1>
<form class="col-lg-6 offset-lg-3" method="POST">
  <div class="text-center">
    <label for="CodeMED">Code du médicament</label>
    <input type="text" class="form-control" name="CodeMED" placeholder="SMEC" required="true">
  </div>
  <div class="text-center">
    <label for="NomMED">Nom du médicament</label>
    <input type="text" class="form-control" name="NomMED" placeholder="Smecta" required="true">
  </div>
  <div class="text-center">
    <label for="FamMED">Famille du médicament</label>
    <select class="form-control" name="FamMED">
      <?php $lesFamilles = getLesFamilles();
      foreach ($lesFamilles as $famille) {
        ?>
        <option value="<?=$famille['FAM_CODE']?>"> <?php echo $famille['FAM_LIBELLE'] ?> </option>
        <?php
      }
      ?>
    </select>
  </div>
  <div class="text-center">
    <label for="EffetsMED">Effets du médicament</label>
    <textarea class="form-control" name="EffetsMED" rows="2" required="true"></textarea>
  </div>
  <div class="text-center">
    <label for="ContreIndicsMED">Contre indications du médicament</label>
    <textarea class="form-control" name="ContreIndicsMED" rows="2" required="true"></textarea>
  </div>
    <div class="text-center">
    <label for="CompoMED">Composition du médicament</label>
    <textarea class="form-control" name="CompoMED" rows="2" required="true"></textarea>
  </div>
  <div class="text-center">
    <label for="PrixMED">Prix de l'échantillon du médicament</label>
    <input type="number" class="form-control" name="PrixMED" placeholder="" required="true">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Créer</button>
  </div>
   
</form>
</body>
</html>