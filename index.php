<?php

include 'config.php';

class Personnage {
    private $nom;
    private $PV;
    private $PA;
    private $PD;
    private $XP;
    private $niveau;
    private $evolution;
    private $inventaire;

    public function __construct($nom, $PV, $PD, $PA, $XP) {
        $this->nom = $nom;
        $this->PV = $PV;
        $this->PA = $PA;
        $this->PD = $PD;
        $this->XP = $XP;
        $this->niveau = 1;
        $this->evolution = array();
        $this->inventaire = array();
    }

    // BONNE IDEE , METTRE DES SETS A LA PLACE DES THIS, ET PAS METTRE L'XP A 0 MAIS XP TOTAL - XP DU NIVEAU D'AVANT
    public function evoluer() {
        $this->PA += 5;
        $this->PD += 3;
        $this->niveau++;
        $this->XP = 0;
    }

    public function getNom() {
        return $this->nom;
    }
    public function getPV() {
        return $this->PV;
    }

    public function getPA() {
        return $this->PA;
    }

    public function getPD() {
        return $this->PD;
    }

    public function getXP() {
        return $this->XP;
    }

    public function getEvolution() {
        return $this->evolution;
    }
    public function getInventaire() {
        return $this->inventaire;
    }
    public function getNiveau() {
        return $this->niveau;
    }
    public function affronterMonstre($monstre) {
        echo $this->nom . " affrontez le monstre " . $monstre->getNom() . " !<br>";
    }

}   

class Monstre {
    private $nom;
    private $PV;
    private $PA;
    private $PD;

    public function __construct($nom, $PV, $PA, $PD) {
        $this->nom = $nom;
        $this->PV = $PV;
        $this->PA = $PA;
        $this->PD = $PD;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPV() {
        return $this->PV;
    }

    public function getPA() {
        return $this->PA;
    }

    public function getPD() {
        return $this->PD;
    }
}

class Salle {
    private $type;
    private $event;
    private $experience;
    private $monstre;
    public function __construct($type, $event, $experience, $monstre) {
        $this->type = $type;
        $this->event = $event;
        $this->experience = $experience;
        $this->monstre = $monstre;
    }

    public function getType() {
        return $this->type;
    }

    public function getEvent() {
        return $this->event;
    }
    
    public function getExperience() {
        return $this->experience;
    }

    public function getMonstre() {
        return $this->monstre;
    }

}

class Salle_speciale extends Salle {
    public function __construct($type, $event, $experience, $monstre) {
        parent::__construct($type, $event, $experience, $monstre);
    }
}

class Inventaire {
    private $obj1;
    private $obj2;
    private $obj3;
    private $obj4;
    private $obj5;
    private $obj6;
    private $obj7;
    private $obj8;
    private $obj9;
    private $obj10;

    public function __construct($obj1,$obj2,$obj3,$obj4,$obj5,$obj6,$obj7,$obj8,$obj9,$obj10) {
        $this->obj1 = $obj1;
        $this->obj2 = $obj2;
        $this->obj3 = $obj3;
        $this->obj4 = $obj4;
        $this->obj5 = $obj5;
        $this->obj6 = $obj6;
        $this->obj7 = $obj7;
        $this->obj8 = $obj8;
        $this->obj9 = $obj9;
        $this->obj10 = $obj10;
    }

    public function getObj1() {
        return $this->obj1;
    }

    public function getObj2() {
        return $this->obj2;
    }
    
    public function getObj3() {
        return $this->obj3;
    }
    
    public function getObj4() {
        return $this->obj4;
    }
    
    public function getObj5() {
        return $this->obj5;
    }
    
    public function getObj6() {
    
        return $this->obj6;
    }
    
    public function getObj7() {
        return $this->obj7;
    }
    
    public function getObj8() {
        return $this->obj8;
    }
    
    public function getObj9() {
        return $this->obj9;
    }
    
    public function getObj10() {
        return $this->obj10;
    }
    
    public function setObj1($obj1) {
        $this->obj1 = $obj1;
    }
    
    public function setObj2($obj2) {
        $this->obj2 = $obj2;
    }
    
    public function setObj3($obj3) {
        $this->obj3 = $obj3;
    }
    
    public function setObj4($obj4) {
        $this->obj4 = $obj4;
    }
    public function setObj5($obj5) {
    
        $this->obj5 = $obj5;
    }
    
    public function setObj6($obj6) {
        $this->obj6 = $obj6;
    }
    
    public function setObj7($obj7) {
        $this->obj7 = $obj7;
    }
    
    public function setObj8($obj8) {
        $this->obj8 = $obj8;
    }
    
    public function setObj9($obj9) {
        $this->obj9 = $obj9;
    }

    public function set10($obj10) {
        $this->obj10 = $obj10;
    }
}

class Butin {
    private $butin_classique;
    private $butin_special;
    public function __construct() {
        $this->butin_classique = array();
        $this->butin_special = array();
    }

    public function getButinClassique() {
        return $this->butin_classique;
    }

    public function setButinClassique($butin_classique) {
        $this->butin_classique = $butin_classique;
    }

    public function setButinSpecial($butin_special) {
        $this->butin_special = $butin_special;
    }

    public function getButinSpecial() {
        return $this->butin_special;
    }
}

class Objet {
    private $nom;
    private $type;
    private $malediction;
    private $value;
    public function __construct($nom, $type, $malediction, $value) {
        $this->nom = $nom;
        $this->type = $type;
        $this->malediction = $malediction;
        $this->value = $value;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getType() {
        return $this->type;
    }

    public function getMalediction() {
        return $this->malediction;
    }

    public function getValue() {
        return $this->value;
    }
}

class DAO {
    private $bdd;
    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function addObject($objet)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO objet (nom, type, malediction, value) VALUES (?, ?, ?, ?)");
            $requete->execute([$objet->getNom(), $objet->getType(), $objet->getMalediction(), $objet->getValue()]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout du objet: " . $e->getMessage();
        }
    }
    
    public function createNewPerso($personnage) {
        try {
            $row = $this->bdd->prepare("INSERT INTO personnage (nom,pv,pa,pd,pds,exp,niveau,evolution,inventaire_id) VALUES (?,?,?,?,?,?,?,?,?)");
            $row->execute([
                $personnage->getNom(),
                $personnage->getPv(),
                $personnage->getPa(),
                $personnage->getPd(),
                $personnage->getPds(),
                $personnage->getExp(),
                $personnage->getNiveau(),
                $personnage->getEvolution(),
                $personnage->getInventaire_id()            
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du joueur: " . $e->getMessage();
            return false;
        }
    }

    public function addSalle($salle)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO salle (type, event, expSalle, monstre_id) VALUES (?, ?, ?, ?)");
            $requete->execute([$salle->getType(), $salle->getEvent(), $salle->getExperience(), $salle->getMonstre()]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout du objet: " . $e->getMessage();
        }
    }

    public function selectParty() {}

    public function getPerso() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM personnage");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des personnages " . $e->getMessage();
            return false;
        }
    }

    public function getInventory () {
        try {
            $row = $this->bdd->prepare("SELECT * FROM inventaire");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }

    public function getObjet() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM objet WHERE type = 0");
            $row->execute();
            $tempBut = array(); 
            while ($rowItem = $row->fetch(PDO::FETCH_ASSOC)) {
                $tempBut[] = $rowItem;
            }
            
            $butin->setButinClassique($tempBut);
            $row2 = $this->bdd->prepare("SELECT * FROM objet WHERE type = 1");
            $row2->execute();
            $tempBut2 = array(); 
            while ($rowItem2 = $row->fetch(PDO::FETCH_ASSOC)) {
                $tempBut2[] = $rowItem2;
            }
            $butin->setButinSpecial($tempBut2);
            return true;
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }
    

    public function getSave() {
        try {
            echo "Voici les sauvegardes > ";
            $row = $this->bdd->prepare("SELECT * FROM save");
            $row->execute();
            $userSelection = readline(">");
            $row2 = $this->bdd->prepare("SELECT * FROM save WHERE id = ?", [$userSelection]);
            $row2->execute();
            $row = "";
            return true;
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }

    public function getSalle() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM salle");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des salles " . $e->getMessage();
            return false;
        }
    }

    public function getPerso() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM personnage");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des personnages " . $e->getMessage();
            return false;
        }
    }

    public function getMonstre() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM monstre");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des monstres " . $e->getMessage();
            return false;
        }
    }

    public function getPiege() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM piege");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des pièges " . $e->getMessage();
            return false;
        }
    }

    public function getAttaque() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM attaque");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des attaques " . $e->getMessage();
            return false;
        }
    }

    public function getEnigma() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM enigma");
            $row->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des énigmes " . $e->getMessage();
            return false;
        }
    }

    public function updatePerso($id) {
        try {
            $row = $this->bdd->prepare("UPDATE perso SET nom = ?, pv = ?, pa = ?, pd = ?, exp = ?, niveau = ?, evolution = ? WHERE id = ?");
            $row->execute($personnage->getNom(),$personnage->getPV(),$personnage->getPA(),$personnage->getPD(),$personnage->getExperience(),$personnage->getNiveau(),$personnage->getEvolution(),[$id]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la modification du personnage " . $e->getMessage();
            return false;
        }
    }

    public function updateSalle($id) {
        try {
            $row = $this->bdd->prepare("UPDATE salle SET type = ?, event = ?, expSalle = ?, monstre_id = ? WHERE id = ?");
            $row->execute($salle->getType(), $salle->getEvent(), $salle->getExperience(), $salle->getMonstre(), [$id]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la salle " . $e->getMessage();
            return false;
        }
    }

    public function updateMonstre($id) {
        try {
            $row = $this->bdd->prepare("UPDATE monstre SET nom = ?, pd = ?, pa = ?, pv = ? WHERE id = ?");
            $row->execute($monstre->getNom(),$monstre->getPD(),$monstre->getPA(),$monstre->getPV(),[$id]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la modification du monstre " . $e->getMessage();
            return false;
        }
    }

    public function updateInventaire($id) {
        try {
            $row = $this->bdd_>prepare("UPDATE inventaire SET obj1 = ?, obj2 = ?, obj3 = ?, obj4 = ?, obj5 = ?, obj6 = ?, obj7 = ?, obj8 = ?, obj9 = ?, obj10 = ? WHERE id = ?");
            $row->execute($inventaires->getObj1(),$inventaires->getObj2(),$inventaires->getObj3(),$inventaires->getObj4(),$inventaires->getObj5(),$inventaires->getObj6(),$inventaires->getObj7(),$inventaires->getObj8(),$inventaires->getObj9(),$inventaires->getObj10(),[$id]);
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de l'inventaire " . $e->getMessage();
        }
    }
}

$DAO = new DAO($connexion);
$objet = new Objet("epee", 1, 0, 10);
// $DAO->addObject($objet);

$personnage = new Personnage("Raph", 200, 50, 40, 125);
// print_r($personnage);
$salle = new Salle(0, 0, 1, 2);
$DAO->addSalle($salle);
// print_r($salle);

$butin = new Butin();
$butin->setButinClassique(["epee", "gants", "casque"]);
$butin->setButinSpecial(["grosse epee", "gants metal", "casque metal"]);
// print_r($butin);

$salle_special = new Salle_speciale(1, 0, 3, 4);
// print_r($salle_special);

$inventaires = new Inventaire();

$a = 0;

while ($a === 0) {
    echo "Bienvenue dans Donjon & Dragon !\n\n";
    sleep(1);
    echo "Que souhaites-tu faire ?\n1 - Jouer\n2 - Voir l'inventaire\n3 - Voir les personnages\n4 - Créer un personnage\n5 - Récuperer une sauvegarde\n6 - Quitter\n";
    $choice = readline("> ");
    switch ($choice) {
        case 1:

            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        case 5;
            break;
        case 6:
            $a = 1;
            break;
        default:
            echo "Choix impossible !\n";
            break;
    }
}
?>