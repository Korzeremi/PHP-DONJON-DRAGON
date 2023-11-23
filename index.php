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

    public function __construct($nom, $PV, $PD, $PA, $XP, $inventaire) {
        $this->nom = $nom;
        $this->PV = $PV;
        $this->PA = $PA;
        $this->PD = $PD;
        $this->XP = $XP;
        $this->niveau = 1;
        $this->evolution = "[['poing', 2, 3], ['pied', 2, 3]]";
        $this->inventaire = $inventaire;
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
            $requete->execute([$objet->getNom(), 
                               $objet->getType(), 
                               $objet->getMalediction(), 
                               $objet->getValue()
                            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout du objet: " . $e->getMessage();
        }
    }
    
    public function addSalle($salle)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO salle (type, event, expSalle, monstre_id) VALUES (?, ?, ?, ?)");
            $requete->execute([$salle->getType(),
                               $salle->getEvent(), 
                               $salle->getExperience(), 
                               $salle->getMonstre()
                            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout de la salle: " . $e->getMessage();
        }
    }

    public function addMonstre($monstre)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO monstre (nom, pd, pa, pv) VALUES (?, ?, ?, ?)");
            $requete->execute([$monstre->getNom(), 
                               $monstre->getPD(), 
                               $monstre->getPA(), 
                               $monstre->getPV()
                            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout du monstre: " . $e->getMessage();
        }
    }


    public function addPersonnage($personnage) {
        try {
            $row = $this->bdd->prepare("INSERT INTO personnage (nom, pv, pa, pd, exp, niveau, evolution, inventaire_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $row->execute([
                $personnage->getNom(),
                $personnage->getPV(),
                $personnage->getPA(),
                $personnage->getPD(),
                $personnage->getXP(),
                $personnage->getNiveau(),
                $personnage->getEvolution(),
                $personnage->getInventaire()            
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du joueur: " . $e->getMessage();
            return false;
        }
    }


    public function selectParty() {}

    public function getPerso() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM personnage");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des personnages " . $e->getMessage();
            return [];
        }
    }

    public function getInventory () {
        try {
            $row = $this->bdd->prepare("SELECT * FROM inventaire");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return [];
        }
    }

    public function getObjet($butin) {
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
            $row = $this->bdd->prepare("SELECT * FROM save");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return [];
        }
    }

    public function getSaveById($id) {
        try {
            $row = $this->bdd->prepare("SELECT * FROM save WHERE id = ?");
            $row->execute([$id]);
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return [];
        }
    }

    public function getSalle() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM salle");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des salles " . $e->getMessage();
            return [];
        }
    }

    public function getMonstre() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM monstre");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des monstres " . $e->getMessage();
            return [];
        }
    }

    public function getPiege() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM piege");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des pièges " . $e->getMessage();
            return [];
        }
    }

    public function getAttaque() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM attaque");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des attaques " . $e->getMessage();
            return [];
        }
    }

    public function getEnigma() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM enigma");
            $row->execute();
            return $row->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des énigmes " . $e->getMessage();
            return [];
        }
    }
}

$DAO = new DAO($connexion);
$personnages = $DAO->getPerso();

// $objet = new Objet("epee", 1, 0, 10);
// $DAO->addObject($objet);
// $objet = new Objet("gants", 1, 0, 13);
// $DAO->addObject($objet);
// $objet = new Objet("casque", 0, 1, 20);
// $DAO->addObject($objet);

// $personnage = new Personnage("Raph", 200, 50, 40, 125, NULL);
// $DAO->addPersonnage($personnage);
// print_r($personnage);

// $salle = new Salle(0, 0, 1, 1);
// $DAO->addSalle($salle);

// $monstre = new Monstre("Mechant 1", 50, 40, 200);
// $DAO->addMonstre($monstre);
// $monstre = new Monstre("Mechant 2", 50, 40, 180);
// $DAO->addMonstre($monstre);

$butin = new Butin();
$butin->setButinClassique(["epee", "gants", "casque"]);
$butin->setButinSpecial(["grosse epee", "gants metal", "casque metal"]);
// print_r($butin);

$salle_special = new Salle_speciale(1, 0, 3, 4);
// print_r($salle_special);

$a = 0;
$main_char = "";

while ($a === 0) {
    popen("cls", "w");
    echo "Bienvenue dans Donjon & Dragon !\n\n";
    sleep(1);
    echo "Que souhaites-tu faire ?\n1 - Jouer\n2 - Voir l'inventaire\n3 - Voir les personnages\n4 - Créer un personnage\n5 - Récuperer une sauvegarde\n6 - Quitter\n";
    $choice = readline("> ");
    switch ($choice) {
        case 1:
            echo "Jouer";
            readline("> ");
            break;
        case 2:
            if ($main_char === "") {
                echo "Tu dois choisir un personnage pour pouvoir voir l'inventaire";
                sleep(1);
                return;
            } else if (gettype($main_char) != 'string') {
                echo "Choix impossible !";
                sleep(1);
                return;
            } else {
                echo "JE T'AFFICHE CA CHAMPION !";
            }
            break;
        case 3:
            popen("cls", "w");
            foreach ($personnages as $personnage) {
                echo "Nom : " . $personnage["nom"] . "\n" .
                     "PV : " . $personnage["pv"] . "\n" . 
                     "Puissance d'attaque : " . $personnage["pa"] . "\n" . 
                     "Defense : " . $personnage["pd"] . "\n" . 
                     "XP : " . $personnage["exp"] . "\n" . 
                     "Niveau : " . $personnage["niveau"] . "\n\n";
                     sleep(1);
            }
            echo "Appuie sur Entrer pour retourner au menu\n";
            readline("> ");
            break;
        case 4:
            popen("cls", "w");
            echo "Quel nom souhaites-tu donner ?\n";
            $nom = readline("> ");
            popen("cls", "w");
            echo "Comment souhaites-tu que ton personnage soit orienté ?\n1 - Axé Attaque\n2 - Axé Point de vie\n3 - Axé Défense\n4 - Quitter\n";
            $choice = readline("> ");
            switch ($choice) {
                case 1:
                    $personnage = new Personnage($nom, 50, 20, 15, 0, NULL);
                    break;
                case 2:
                    $personnage = new Personnage($nom, 150, 7, 20, 0, NULL);
                    break;
                case 3:
                    $personnage = new Personnage($nom, 80, 8, 40, 0, NULL);
                    break;
                case 4:
                    break;
                default:
                    echo "Choix indisponible !\n";

            }
            $DAO->addPersonnage($personnage);
            popen("cls", "w");
            echo "Création du personnage...";
            sleep(1);
            break;
        case 5:
            echo "Récuperation la sauvegarde...";
            sleep(1);
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