<?php
class Database {
	private $bdd;

	public function __construct($hote, $bdname, $nom_user, $password) {
		try {
		    $this->bdd = new PDO('mysql:host='.$hote.';dbname='.$bdname.'', $nom_user, '');
		    $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		    $this->bdd->query("SET NAMES 'utf8'");
		} catch (PDOException $e) {
		    echo 'Connexion échouée : ' . $e->getMessage();
		}
	}

	 public function getCours() {
		return $this->bdd->query("SELECT * FROM COURS");
	}

	public function getInstruments() {
		return $this->bdd->query("SELECT * FROM INSTRUMENT");
	}


	public function addAdherent($nom, $prenom, $email, $tel, $pwd) {
		$req = $this->bdd->prepare("INSERT INTO adherents VALUES('',:nom,:prenom,:email,:tel,:pwd,0)");
		$req->execute(array(
				':nom' => $nom,
				':prenom' => $prenom,
				':email' => $email,
				':tel' => $tel,
				':pwd' => $pwd
				
			));
		 return $this->bdd->lastInsertId();       /*lastInsertId  permet de recuperer l id qui est automatiquement incrementé*/
	}

	public function calculTarifcours($id_adherent) {
echo 'lool';
         $req=$this->bdd->prepare( "SELECT SUM(tarifMensuel)  
        FROM adherents a, inscription i, cours c
        WHERE c.id_cours=i.id_cours AND a.id_adherent=i.id_adherent AND a.id_adherent=:id_adherent" );
        $req->execute(array(
			':id_adherent'=>$id_adherent

			));
        return $req->fetchColumn();
	}


public function calculTarifInstru($id_adherent) {

         $req=$this->bdd->prepare( "SELECT SUM(tarif)  
        FROM adherents a, apprendre app, instrument i
        WHERE a.id_adherent=app.id_adherent AND app.ref_instrument=i.ref_instrument AND a.id_adherent=:id_adherent " );
         $req->execute(array(
			':id_adherent'=>$id_adherent

			));
        return $req->fetchColumn();
	}


	public function updateTarifAdherent($id_adherent, $tarif) {
		$req = $this->bdd->prepare("UPDATE ADHERENTS SET tariftotal=:tarif WHERE id_adherent=:id_adherent"); 
	    $req->execute(array(
			':tarif'=>$tarif,
			':id_adherent'=>$id_adherent

			));
           
	}

    public function verifmail($mail){
    	$req = $this->bdd->prepare("SELECT count(*) FROM adherents WHERE mail=:mail");
    	$req->execute(array(':mail'=>$mail));

    	return $req->fetchColumn();
	
    	}


    public function getid($mail){
    	$req = $this->bdd->prepare("SELECT id_adherent FROM adherents WHERE mail=:mail");
    	return $req->execute(array(
    		':mail'=>$mail));
    }



public function remplissage1($id_adherent,$cours){                                          /* permet de remplir la table inscription cours*/
	$req = $this->bdd->prepare("INSERT INTO inscription VALUES(:id_adherent,:id_cours)");
		$req->execute(array(
				':id_adherent'=>$id_adherent,
				':id_cours'=>$cours
				));

				}

public function remplissage2($id_adherent,$ref_instrument){                               /* permet de remplir la table apprendre qui concerne les instruments*/
	$req = $this->bdd->prepare("INSERT INTO apprendre VALUES(:id_adherent,:ref_instrument)");
		$req->execute(array(
				':id_adherent'=>$id_adherent,
				':ref_instrument'=>$ref_instrument
				));

				}



public function recap($id_adherent){
	$req= $this->bdd->prepare("SELECT nom_cours,tarifMensuel FROM inscription i,cours c WHERE c.id_cours=i.id_cours and i.id_adherent=:id_adherent" );
	$req->execute(array(
		':id_adherent'=>$id_adherent)); 
	$res = $req->fetchAll();
	return $res;

 
}
 
public function getdonnee() {
	return $this->bdd->query("SELECT * FROM cours c,inscription i WHERE c.id_cours=i.id_cours");
}








	 


}