CREATE DATABASE ded;
USE ded;

CREATE TABLE inventaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(55),
    type INT,
    value INT
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
    type BOOL,
    event INT,
    expSalle INT,
    monstre_id INT,
    FOREIGN KEY (monstre_id) REFERENCES monstre(id)
);

CREATE TABLE objet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type BOOL,
    malediction BOOL,
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