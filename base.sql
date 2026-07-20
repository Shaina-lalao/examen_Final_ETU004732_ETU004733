CREATE DATABASE IT_vente;

USE IT_vente;

CREATE TABLE membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    numero_etu INT,
    image_profil VARCHAR(255)
);

CREATE TABLE categorie (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(50)
);

CREATE TABLE produit (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    id_categorie INT,
    prix_reference INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)
);

CREATE TABLE produit_membre (
    id_produit_membre INT AUTO_INCREMENT PRIMARY KEY,
    id_produit INT,
    id_membre INT,
    prix_vente INT,
    quantite_dispo INT,
    date_dispo DATE,
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

CREATE TABLE vente (
    id_vente INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    heure TIME,
    id_produit_membre INT,
    quantite INT,
    FOREIGN KEY (id_produit_membre) REFERENCES produit_membre(id_produit_membre)
);

-- Table MEMBRES

INSERT INTO membre (nom, numero_etu, image_profil) VALUES
('Rakoto', 2201, 'rakoto.jpg'),
('Rabe', 2202, 'rabe.jpg'),
('Rasoa', 2203, 'rasoa.jpg'),
('Randria', 2204, 'randria.jpg'),
('Razafy', 2205, 'razafy.jpg'),
('Andry', 2206, 'andry.jpg'),
('Tahina', 2207, 'tahina.jpg'),
('Faniry', 2208, 'faniry.jpg'),
('Miora', 2209, 'miora.jpg'),
('Toky', 2210, 'toky.jpg');


-- Table CATEGORIES 

INSERT INTO categorie (nom_categorie) VALUES
('Plat'),
('Boisson'),
('Snack'),
('Dessert');

-- Table PRODUITS 

INSERT INTO produit (nom, id_categorie, prix_reference) VALUES
('Burger', 1, 15000.00),
('Pizza', 1, 25000.00),
('Frites', 1, 8000.00),
('Sandwich', 1, 12000.00),

('Jus de fruit', 2, 5000.00),
('Coca-Cola', 2, 4000.00),
('Eau minérale', 2, 2000.00),
('Milkshake', 2, 7000.00),

('Chips', 3, 3000.00),
('Pop-corn', 3, 3500.00),
('Hot-dog', 3, 10000.00),

('Gâteau au chocolat', 4, 8000.00),
('Donut', 4, 4000.00),
('Crêpe', 4, 6000.00),
('Glace', 4, 5000.00);

-- Table PRODUITS MIS EN VENTE 

INSERT INTO produit_membre
(id_produit, id_membre, prix_vente, quantite_dispo, date_dispo)
VALUES

(1,1,14000.00,10,'2026-07-20'),
(2,2,24000.00,5,'2026-07-20'),
(3,3,7500.00,20,'2026-07-21'),
(4,4,11000.00,8,'2026-07-21'),

(5,5,4500.00,30,'2026-07-20'),
(6,6,3500.00,25,'2026-07-20'),
(7,7,1800.00,40,'2026-07-22'),
(8,8,6500.00,12,'2026-07-22'),

(9,9,2800.00,15,'2026-07-20'),
(10,10,3200.00,18,'2026-07-21'),
(11,1,9500.00,10,'2026-07-22'),

(12,2,7500.00,7,'2026-07-20'),
(13,3,3500.00,20,'2026-07-20'),
(14,4,5500.00,14,'2026-07-21'),
(15,5,4500.00,16,'2026-07-22'),

(1,6,14500.00,6,'2026-07-23'),
(5,7,4700.00,22,'2026-07-23'),
(9,8,2900.00,17,'2026-07-23'),
(12,9,7800.00,5,'2026-07-24'),
(2,10,24500.00,4,'2026-07-24');