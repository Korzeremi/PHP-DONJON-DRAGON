CREATE DATABASE ded;
USE ded;

CREATE TABLE personnage (
    persoId INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    pa INT,
    pv INT,
    pd INT,
    exp INT,
    evolution TEXT,
    FOREIGN KEY (inventId) REFERENCES inventaire(inventId)
);

CREATE TABLE attaque (
    attaqueId INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(75),
    valeur INT,
    exp INT
);

CREATE TABLE monstre (
    monstreId INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(55),
    pd INT,
    pds INT,
    pv INT
);

CREATE TABLE inventaire (
    inventId INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(55),
    type INT,
    value INT
);

-- CREATE TABLE save (
-- );

CREATE TABLE salle (
    salleId INT AUTO_INCREMENT PRIMARY KEY,
    type BOOL,
    event INT,
    expSalle INT,
    FOREIGN KEY (monstreId) REFERENCES monstre(monstreId)
    monstreId INT
);

CREATE TABLE objet (
    objetId INT AUTO_INCREMENT PRIMARY KEY,
    type BOOL,
    malediction BOOL,
    value INT
);

CREATE TABLE enigma (
    enigmaId INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255),
    reponse VARCHAR(255)
);

CREATE TABLE piege (
    piegeId INT AUTO_INCREMENT PRIMARY KEY,
    value INT,
    phrase VARCHAR(255)
);
