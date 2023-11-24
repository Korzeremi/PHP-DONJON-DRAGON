<?php
//On inclus la page config.php pour la relation avec la base de donnée
include 'config.php';
// On viens declarer plusieurs classes (ici la classe personnage)
class Personnage {
    //On annonce ses variables
    private $nom;
    private $PV;
    private $PA;
    private $PD;
    private $XP;
    private $niveau;
    private $evolution;
    private $inventaire;
//on fait le construct 
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

    //On fait une fonction evoluer pour quand on change de salle on augmente de niveau, de puissance , etc
    public function evoluer() {
        $this->PA += 5;
        $this->PD += 3;
        $this->niveau++;
        $this->XP = 0;
    }
//on fait tout les get et set de la classe pour pouvoir les appeller plus tard
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


    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPV($PV) {
        $this->PV = $PV;
    }

    public function setPA($PA) {
        $this->PA = $PA;
    }

    public function setPD($PD) {
        $this->PD = $PD;
    }

    public function setXP($XP) {
        $this->XP = $XP;
    }

    public function setNiveau($niveau) {
        $this->niveau = $niveau;
    }

    public function setEvolution($evolution) {
        $this->evolution = $evolution;
    }

    public function setInventaire($inventaire) {
        $this->inventaire = $inventaire;
    }
// la fonction affronterMonstre est créée pour engager le combat
    public function affronterMonstre($monstre) {
        echo $this->nom . " affrontez le monstre " . $monstre->getNom() . " !<br>";
    }

}   
//On declare ensuite la classe monstre qui a les variables "de base" de la classe personnage
class Monstre {
    private $nom;
    private $PV;
    private $PA;
    private $PD;
//On fait son construct et les get et set
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

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPV($PV) {
        $this->PV = $PV;
    }

    public function setPA($PA) {
        $this->PA = $PA;
    }

    public function setPD($PD) {
        $this->PD = $PD;
    }
}
//on declare la classe salle 
class Salle {
    private $type;
    private $event;
    private $experience;
    private $monstre;

    //On creer aussi le construct, les get, et set
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

    public function setType($type) {
        $this->type = $type;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function setMonstre($monstre) {
        $this->monstre = $monstre;
    }

}
//On viens declare la salle_speciale qui est une classe salle ou on retouvera le troqueur ou des monstres speciaux
class Salle_speciale extends Salle {
    public function __construct($type, $event, $experience, $monstre) {
        parent::__construct($type, $event, $experience, $monstre);
    }
}

//on declare la classe inventaire ou on qui sera constituer de slots pour deposer ses objets
//ainsi que le statut pour savoir si il est vide ou plein
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


    //on creer son construct, getteur, setteur
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
//On declare ensuite la classe butin pour definir les 2 type de butin que l'on peux avoir 
class Butin {
    private $butin_classique;
    private $butin_special;

    //on fait son construct, ses guetteurs et setteurs 
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

//on declare la classe objet
class Objet {
    private $nom;
    private $type;
    private $arme;
    private $statut;
    private $malediction;
    private $value;

    public function __construct($nom, $type, $statut, $arme, $malediction, $value) {
        $this->nom = $nom;
        $this->type = $type;
        $this->statut = $statut;
        $this->arme = $arme;
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

    public function getArme() {
        return $this->arme;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getValue() {
        return $this->value;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setArme($arme) {
        $this->arme = $arme;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setMalediction($malediction) {
        $this->malediction = $malediction;
    }

    public function setValue($value) {
        $this->value = $value;
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
            $requete = $this->bdd->prepare("INSERT INTO objet (nom, type, arme, malediction, statut, value) VALUES (?, ?, ?, ?, ?, ?)");
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

    public function addInventaire($inventaire) {
        try {
            $row = $this->bdd->prepare("INSERT INTO inventaire (obj1, obj2, obj3, obj4, obj5, obj6, obj7, obj8, obj9, obj10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $row->execute([
                $inventaire->getObj1(),
                $inventaire->getObj2(),
                $inventaire->getObj3(),
                $inventaire->getObj4(),
                $inventaire->getObj5(),
                $inventaire->getObj6(),
                $inventaire->getObj7(),
                $inventaire->getObj8(),          
                $inventaire->getObj9(),          
                $inventaire->getObj10()          
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

    // TOUS LES INVENTAIRES
    public function getInventaire () {
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

    public function updatePerso($id, $personnage) {
        try {
            $row = $this->bdd->prepare("UPDATE perso SET nom = ?, pv = ?, pa = ?, pd = ?, exp = ?, niveau = ?, evolution = ? WHERE id = ?");
            $row->execute($personnage->getNom(),$personnage->getPV(),$personnage->getPA(),$personnage->getPD(),$personnage->getExperience(),$personnage->getNiveau(),$personnage->getEvolution(),[$id]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la modification du personnage " . $e->getMessage();
            return false;
        }
    }

    public function updateSalle($id, $salle) {
        try {
            $row = $this->bdd->prepare("UPDATE salle SET type = ?, event = ?, expSalle = ?, monstre_id = ? WHERE id = ?");
            $row->execute($salle->getType(), $salle->getEvent(), $salle->getExperience(), $salle->getMonstre(), [$id]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la salle " . $e->getMessage();
            return false;
        }
    }

    public function updateMonstre($id, $monstre) {
        try {
            $row = $this->bdd->prepare("UPDATE monstre SET nom = ?, pd = ?, pa = ?, pv = ? WHERE id = ?");
            $row->execute($monstre->getNom(),$monstre->getPD(),$monstre->getPA(),$monstre->getPV(),[$id]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la modification du monstre " . $e->getMessage();
            return false;
        }
    }

    public function updateInventaire($id, $inventaires) {
        try {
            $row = $this->bdd->prepare("UPDATE inventaire SET obj1 = ?, obj2 = ?, obj3 = ?, obj4 = ?, obj5 = ?, obj6 = ?, obj7 = ?, obj8 = ?, obj9 = ?, obj10 = ? WHERE id = ?");
            $row->execute($inventaires->getObj1(),$inventaires->getObj2(),$inventaires->getObj3(),$inventaires->getObj4(),$inventaires->getObj5(),$inventaires->getObj6(),$inventaires->getObj7(),$inventaires->getObj8(),$inventaires->getObj9(),$inventaires->getObj10(),[$id]);
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de l'inventaire " . $e->getMessage();
        }
    }

    public function removePersoById($id, $personnage) {
        try {
            $row = $this->bdd->prepare("DROP FROM personnage WHERE id = ?");
            $row->execute([$id]);
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du personnage " . $e->getMessage();
        }
    }

    public function removeInventaire() {
        try {
            $row = $this->bdd->prepare("DROP FROM inventaire");
            $row->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'inventaire " . $e->getMessage();
        }
    }
}

    $DAO = new DAO($connexion);
    $personnages = $DAO->getPerso();
    $salles = $DAO->getSalle();

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
    // $butin->setButinClassique(["epee", "gants", "casque"]);
    // $butin->setButinSpecial(["grosse epee", "gants metal", "casque metal"]);
    // print_r($butin);

    $salle_special = new Salle_speciale(1, 0, 3, 4);
    // print_r($salle_special);

    $inventaires = new Inventaire(1,1,1,1,1,1,1,1,1,1,1);

    function Menu($personnages, $DAO) {
        global $main_char;
        $a = 0;
        $main_char = "";
        while ($a === 0) {
            popen("clear", "w");
            popen("cls", "w");
            echo "Bienvenue dans Donjon & Dragon !\n\n";
            sleep(1);
            echo "Que souhaites-tu faire ?\n1 - Jouer\n2 - Afficher tous les personnages\n3 - Voir l'inventaire\n4 - Création de personnage\n5 - Sauvegarde\n6 - Quitter\n";
            echo "> ";
            $choice =  trim(fgets(STDIN));
            switch ($choice) {
                case 1:
                    jouer();
                    break;
                case 2:
                    AfficherPersonnages($personnages);
                    break;
                case 3:
                    VoirInventaire($DAO);
                    break;
                case 4:
                    CreationPersonnage($DAO);
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
    }

    function jouer($salles) {
        global $main_char;
        $donjon = [];
        for ($i = 1; $i <= $main_char["id"]; $i++) {
            $random_room_id = rand(1, 10); 
            $room = $salles[$random_room_id - 1];
            array_push($donjon, $room);
            switch ($room["event"]) {
                case 1:
                    // combat
                    break;
                case 2:
                    // piege
                    break;
                case 3:
                    // marchand
                    break;
                case 4:
                    // enigme
                    break;
            }
        }
    }

    function AfficherPersonnages($personnages) {
        popen("clear", "w");
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
        echo "> ";
        $pass = trim(fgets(STDIN));
    }

    function CreationPersonnage($DAO) {
        global $main_char;
        popen("clear", "w");
        popen("cls", "w");
            echo "Quel nom souhaites-tu donner ?\n";
            echo "> ";
            $nom = trim(fgets(STDIN));
            popen("cls", "w");
            echo "Comment souhaites-tu que ton personnage soit orienté ?\n1 - Axé Attaque\n2 - Axé Point de vie\n3 - Axé Défense\n4 - Quitter\n";
            echo "> ";
            $inventaire = new Inventaire(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            $DAO->addInventaire($inventaire);
            $inventaires = $DAO->getInventaire();
            $inventaire = $inventaires[count($inventaires)-1];
            $choice = trim(fgets(STDIN));
            if ($choice < 1 || $choice > 3) {
                echo "Choix impossible !";
                sleep(1);
                return;
            }
            switch ($choice) {
                case 1:
                    $personnage = new Personnage($nom, 50, 20, 15, 0, $inventaire["id"]);
                    break;
                case 2:
                    $personnage = new Personnage($nom, 150, 7, 20, 0, $inventaire["id"]);
                    break;
                case 3:
                    $personnage = new Personnage($nom, 80, 8, 40, 0, $inventaire["id"]);
                    break;
                case 4:
                    break;
                default:
                    echo "Choix indisponible !\n";
            }

        $DAO->addPersonnage($personnage);
        $personnages = $DAO->getPerso();
        $personnage = $personnages[count($personnages) - 1];
        $main_char = $personnage;
        popen("clear", "w");
        popen("cls", "w");
        echo "Création du personnage...";
        sleep(1);
    }

    function VoirInventaire($DAO) {
        global $main_char;
        if ($main_char === "") {
            echo "Tu dois choisir un personnage pour pouvoir voir l'inventaire";
            sleep(1);
            return;
        } else if (gettype($main_char) != 'array') {
            echo "Choix impossible !";
            sleep(1);
            return;
        } else {
            $inventaires = $DAO->getInventaire();
            $inventaire = $inventaires[$main_char["inventaire_id"] - 1];
            popen("cls", "w");
            popen("clear", "w");
            echo "Ton inventaire :\n" .
                 "\nObject 1 : " . $inventaire["obj1"] . 
                 "\nObject 2 : " . $inventaire["obj2"] . 
                 "\nObject 3 : " . $inventaire["obj3"] . 
                 "\nObject 4 : " . $inventaire["obj4"] . 
                 "\nObject 5 : " . $inventaire["obj5"] . 
                 "\nObject 6 : " . $inventaire["obj6"] . 
                 "\nObject 7 : " . $inventaire["obj7"] . 
                 "\nObject 8 : " . $inventaire["obj8"] . 
                 "\nObject 9 : " . $inventaire["obj9"] . 
                 "\nObject 10 : " . $inventaire["obj10"];
            
            echo "\n\nAppuie sur Entrer pour retrourner au menu\n";
            echo "> ";
            trim(fgets(STDIN));
            return;
        }
    }

    menu($personnages, $DAO);

?>