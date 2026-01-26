<?php

namespace App\BDD;

use App\Entity\Database;


$pdo = Database::getInstance();

$pdo->exec("DROP DATABASE IF EXISTS boutique;");

// Crée la BDD boutique
$pdo->exec(
    "CREATE DATABASE IF NOT EXISTS boutique
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;"
);

// Utilisaiton de la base
$pdo->exec("USE boutique;");

// Crée la table produits
$pdo->exec(
    "CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);"
);

// Vider la table pour éviter les doublons
$pdo->exec("TRUNCATE TABLE products;");

// Quelques produits pour tester
$pdo->exec(
    "INSERT INTO products (name, description, price, stock, category) VALUES
    ('Hoodie Noir', 'Sweat à capuche coton', 59.99, 40, 'Vêtements'),
    ('Polo Bleu', 'Polo respirant', 34.99, 60, 'Vêtements'),
    ('Veste Coupe-vent', 'Veste légère imperméable', 89.99, 20, 'Vêtements'),
    ('Bonnet Laine', 'Bonnet chaud', 14.99, 0, 'Accessoires'),
    ('Écharpe Cachemire', 'Écharpe douce', 39.99, 35, 'Accessoires'),
    ('Lunettes de Soleil', 'UV400', 24.99, 80, 'Accessoires'),
    ('Baskets Blanches', 'Style streetwear', 74.99, 45, 'Chaussures'),
    ('Chaussures Ville', 'Cuir noir', 129.99, 18, 'Chaussures'),
    ('Sandales', 'Sandales été', 29.99, 55, 'Chaussures'),
    ('Casque Bluetooth', 'Réduction de bruit', 149.99, 0, 'Électronique'),
    ('Enceinte Portable', 'Bluetooth étanche', 89.99, 40, 'Électronique'),
    ('Montre Connectée', 'Suivi santé', 199.99, 15, 'Électronique'),
    ('Tapis de Yoga', 'Antidérapant', 24.99, 70, 'Sport'),
    ('Haltères 10kg', 'Lot de deux', 59.99, 30, 'Sport'),
    ('Sac de Sport', 'Grande capacité', 44.99, 50, 'Sport'),
    ('Lampe LED', 'Lumière chaude', 19.99, 90, 'Maison'),
    ('Coussin Déco', 'Style scandinave', 22.99, 0, 'Maison'),
    ('Plaid Doux', 'Couverture polaire', 29.99, 40, 'Maison'),
    ('Crème Visage', 'Hydratante', 18.99, 110, 'Beauté'),
    ('Parfum Femme', 'Floral', 49.99, 35, 'Beauté'),
    ('Rasoir Électrique', 'Rechargeable', 69.99, 28, 'Beauté'),
    ('Livre Roman', 'Bestseller', 14.99, 150, 'Loisirs'),
    ('Jeu de Société', 'Famille', 34.99, 60, 'Loisirs'),
    ('Puzzle 1000 pièces', 'Paysage', 19.99, 85, 'Loisirs'),
    ('Gourde Sport', 'Inox 750ml', 17.99, 95, 'Sport'),
    ('Chargeur Rapide', 'USB-C 65W', 29.99, 55, 'Électronique'),
    ('T-shirt Sport', 'Respirant', 27.99, 70, 'Sport'),
    ('Mug Design', 'Céramique', 12.99, 130, 'Maison'),
    ('Sac Bandoulière', 'Cuir vegan', 39.99, 0, 'Accessoires'),
    ('Short Running', 'Léger', 22.99, 58, 'Sport');"
);

// Crée la table categories
$pdo->exec(
    "CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL UNIQUE,
    description TEXT);"
);

// Vider la table pour éviter les doublons
$pdo->exec("TRUNCATE TABLE categories;");

// Quelques catégories pour tester
$pdo->exec(
    "INSERT INTO categories (nom, description) VALUES 
    ('Vêtements', 'Vêtements'),
    ('Accessoires', 'Accessoires'),
    ('Chaussures', 'Chaussures'),
    ('Électronique', 'Électronique'),
    ('Sport', 'Sport'),
    ('Maison', 'Maison'),
    ('Beauté', 'Beauté'),
    ('Loisirs', 'Loisirs');"
);

// Ajoute la colonne category_id à products
$pdo->exec(
    "ALTER TABLE products 
     ADD COLUMN category_id INT;"
);

// Crée la clé étrangère
$pdo->exec(
    "ALTER TABLE products 
     ADD CONSTRAINT fk_product_category 
     FOREIGN KEY (category_id) REFERENCES categories(id);"
);

// Associe quelques produits existants à des catégories
$pdo->exec(
    "UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Vêtements') WHERE category = 'Vêtements';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Accessoires') WHERE category = 'Accessoires';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Chaussures') WHERE category = 'Chaussures';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Électronique') WHERE category = 'Électronique';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Sport') WHERE category = 'Sport';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Maison') WHERE category = 'Maison';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Beauté') WHERE category = 'Beauté';
     UPDATE products SET category_id = (SELECT id FROM categories WHERE nom = 'Loisirs') WHERE category = 'Loisirs';"
);

// Crée la table users

$pdo->exec(
    "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP);"
);

// Vider la table pour éviter les doublons
$pdo->exec("TRUNCATE TABLE users;");

// Créer un utilisateur de test (mot de passe : "secret")
$pdo->exec(
    "INSERT INTO users (name, email, password, role) 
    VALUES 
    ('Admin', 'admin@boutique.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');"
);
