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

INSERT INTO personnage (nom, pv, pa, pd,exp, niveau, evolution, inventaire_id) VALUES (remi,100,20,30,100,10,'',3)
INSERT INTO personnage (nom, pv, pa, pd,exp, niveau, evolution, inventaire_id) VALUES (leon,100,20,30,100,10,'',2)
INSERT INTO personnage (nom, pv, pa, pd,exp, niveau, evolution, inventaire_id) VALUES (raph,100,20,30,100,10,'',1)

INSERT INTO monstre (nom, pv, pa, pd) VALUES (Orc,30,10,20)
INSERT INTO monstre (nom, pv, pa, pd) VALUES (Squelette,50,30,40)
INSERT INTO monstre (nom, pv, pa, pd) VALUES (Dragon,150,60,100)
INSERT INTO monstre (nom, pv, pa, pd) VALUES (zombie,20,15,20)
INSERT INTO monstre (nom, pv, pa, pd) VALUES (extra terrestre,50,30,30)
INSERT INTO monstre (nom, pv, pa, pd) VALUES (loup-garou,100,50,70)


INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',1)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',2)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',2)
INSERT INTO salle (type, event, experience, monstre) VALUES (1,2,'',0)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',4)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',5)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',5)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',6)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',5)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',5)
INSERT INTO salle (type, event, experience, monstre) VALUES (1,2,'',0)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',6)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',6)
INSERT INTO salle (type, event, experience, monstre) VALUES (0,2,'',6)


