CREATE DATABASE ded;
USE ded;

CREATE TABLE inventaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    obj1 INT,
    obj2 INT,
    obj3 INT,
    obj4 INT,
    obj5 INT,
    obj6 INT,
    obj7 INT,
    obj8 INT,
    obj9 INT,
    obj10 INT
);

CREATE TABLE personnage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    pv INT,
    pa INT,
    pd INT,
    exp INT,
    niveau INT,
    evolution TEXT,
    inventaire_id INT,
    FOREIGN KEY (inventaire_id) REFERENCES inventaire(id)
);

CREATE TABLE attaque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(75),
    valeur INT,
    exp INT
);

CREATE TABLE monstre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(55),
    pd INT,
    pa INT,
    pv INT
);

CREATE TABLE save (
    id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE salle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type BOOLEAN,
    event INT,
    expSalle INT,
    monstre_id INT,
    FOREIGN KEY (monstre_id) REFERENCES monstre(id)
);

CREATE TABLE objet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(80),
    type BOOLEAN,
    arme BOOLEAN,
    malediction BOOLEAN,
    statut BOOLEAN,
    value INT
);

CREATE TABLE enigma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255),
    reponse VARCHAR(255)
);

CREATE TABLE piege (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value INT,
    phrase VARCHAR(255)
);

INSERT INTO personnage (nom, pv, pa, pd,exp, niveau, evolution, inventaire_id) 
VALUES 
(remi,100,20,30,100,10,'',3),
(leon,100,20,30,100,10,'',2),
(raph,100,20,30,100,10,'',1);

INSERT INTO monstre (nom, pv, pa, pd)
 VALUES 
(Orc,30,10,20),
(Squelette,50,30,40),
(Dragon,150,60,100),
(zombie,20,15,20),
(extra terrestre,50,30,30),
(loup-garou,100,50,70);


INSERT INTO salle (type, event, experience, monstre) 
VALUES 
(0,=,'',1),
(0,=,'',2),
(0,=,'',2),
(1,=,'',0),
(0,=,'',4),
(0,=,'',5),
(0,=,'',5),
(0,=,'',6),
(0,=,'',5),
(0,=,'',5),
(1,=,'',0),
(0,=,'',6),
(0,=,'',6);


INSERT INTO objet (nom,type,malediction,value) 
VALUES 
(épée en bois,arme,1,5),
(épée en fer,arme,1,15),
(épée en or,arme,1,30),
(épée en diamand,arme,1,50),
(Lance mystique,arme,1,60),
(potion de regeneration,arme,0,20),
(pomme,arme,0,5);

INSERT INTO enigma (question,reponse) 
VALUES 
(qu es ce qui dois etre casser avant qu on lutilise ?, un oeuf ),
( 1+1 ?, 2 ),
( 3*3?, 9 );