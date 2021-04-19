<?php

function getLesMedicaments()
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select * from medicament;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function getLesPerturbePar($Code)
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select MED_PERTURBATEUR from interagir where MED_PERTURBE = '$Code';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function getLesPerturbe($Code)
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select MED_PERTURBE from interagir where MED_PERTURBATEUR = '$Code';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function getLesIndividus()
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select * from type_individu;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function getLesDosages()
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select * from dosage;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function deleteMedicament($Code){
    $retour = false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament', 'root', '')
            or die('Erreur connexion à la base de données'); 
    $requete = "delete from medicament where MED_DEPOTLEGAL = '$Code'";
    $retour = $bdd -> exec($requete);
    return $retour;
}
function deleteIndividu($Code){
    $retour = false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament', 'root', '')
            or die('Erreur connexion à la base de données'); 
    $requete = "delete from type_individu where TIN_CODE = '$Code'";
    $retour = $bdd -> exec($requete);
    return $retour;
}
function getLesFamilles()
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select * from famille;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function insertMedicament($Code, $Nom, $Fam, $Compo, $Effets, $ContreIndic, $Prix){
    $retour = false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8', 'root', '')
            or die('Erreur connexion à la base de données'); 
    $requete = "insert into medicament values ('$Code', '$Nom', '$Fam', '$Compo', '$Effets', '$ContreIndic', '$Prix'); ";
    $retour = $bdd -> exec($requete);
    return $retour;
}
function insertIndividu($Code, $Libelle){
    $retour = false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8', 'root', '')
            or die('Erreur connexion à la base de données'); 
    $requete = "insert into type_individu values ('$Code', '$Libelle'); ";
    $retour = $bdd -> exec($requete);
    return $retour;
}
function insertPrescription($CodeMED, $CodeIndividu, $CodeDosage, $Posologie){
    $retour = false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8', 'root', '')
            or die('Erreur connexion à la base de données'); 
    $requete = "insert into prescrire values ('$CodeMED', '$CodeIndividu', '$CodeDosage', '$Posologie'); ";
    $retour = $bdd -> exec($requete);
    return $retour;
}
function getLesPrescriptionsParMedoc($Code)
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select count(PRE_POSOLOGIE) from prescrire where MED_DEPOTLEGAL = '$Code';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}
function getNbPrescription($Code)
{
    $retour =false;
    $bdd = new PDO('mysql:host=localhost;dbname=medicament;charset=utf8','root','')
        or die('Erreur connexion à la base de données');
    $requete = "select count(PRE_POSOLOGIE) from prescrire where TIN_CODE = '$Code';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}
?>