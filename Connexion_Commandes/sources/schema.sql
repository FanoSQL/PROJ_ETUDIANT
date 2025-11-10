-- Création de la base de données
CREATE DATABASE IF NOT EXISTS client_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE client_app;

-- Table clients
CREATE TABLE clients (
    IdClient INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table commandes
CREATE TABLE commandes (
    IdCommande INT AUTO_INCREMENT PRIMARY KEY,
    IdClient INT NOT NULL,
    reference_commande VARCHAR(50) NOT NULL,
    date_commande DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (IdClient) REFERENCES clients(IdClient) ON DELETE CASCADE
);

-- Table details_commande
CREATE TABLE details_commande (
    IdDetail INT AUTO_INCREMENT PRIMARY KEY,
    IdCommande INT NOT NULL,
    reference_produit VARCHAR(50),
    description TEXT,
    quantite INT DEFAULT 1,
    prix_ttc DECIMAL(10,2),
    FOREIGN KEY (IdCommande) REFERENCES commandes(IdCommande) ON DELETE CASCADE
);

-- Table livraisons
CREATE TABLE livraisons (
    IdLivraison INT AUTO_INCREMENT PRIMARY KEY,
    IdCommande INT NOT NULL,
    adresse_livraison TEXT,
    date_livraison DATE,
    FOREIGN KEY (IdCommande) REFERENCES commandes(IdCommande) ON DELETE CASCADE
);

-- Table journal
CREATE TABLE journal (
    IdJournal INT AUTO_INCREMENT PRIMARY KEY,
    IdClient INT,
    action ENUM('connexion', 'deconnexion') NOT NULL,
    date_action DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (IdClient) REFERENCES clients(IdClient) ON DELETE SET NULL
);

-- Insertion des données d'exemple
INSERT INTO clients (nom, email, mot_de_passe) VALUES
('Dupont Jean', 'jean.dupont@email.com', 'password123'),
('Martin Sophie', 'sophie.martin@email.com', 'password456');

INSERT INTO commandes (IdClient, reference_commande) VALUES
(1, 'CMD-2025-001'),
(1, 'CMD-2025-002'),
(2, 'CMD-2025-003');

INSERT INTO details_commande (IdCommande, reference_produit, description, quantite, prix_ttc) VALUES
(1, 'PROD-001', 'Clavier mécanique RGB', 1, 89.99),
(1, 'PROD-002', 'Souris sans fil', 2, 49.99),
(2, 'PROD-003', 'Écran 27"', 1, 299.99),
(3, 'PROD-004', 'Clé USB 128Go', 3, 29.99);

INSERT INTO livraisons (IdCommande, adresse_livraison, date_livraison) VALUES
(1, '12 rue des Champs, 75008 Paris', '2025-03-15'),
(2, '5 avenue des Lilas, 69003 Lyon', '2025-03-20'),
(3, '8 place de la Gare, 31000 Toulouse', '2025-03-25');