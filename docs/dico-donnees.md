# Dictionnaire de données

## Produits (`products`)

| Champ       | Type          | Spécificités                                    | Description                          |
|-------------|---------------|-------------------------------------------------|--------------------------------------|
| id          | INT           | PRIMARY KEY, AUTO_INCREMENT, NOT NULL, UNSIGNED | L'identifiant du unique produit      |
| name        | VARCHAR(64)   | NOT NULL                                        | Le nom du produit                    |
| description | TEXT          | NULL/NULLABLE                                   | La description du produit            |
| price       | DECIMAL(10,2) | NOT NULL, UNSIGNED, DEFAULT 0.00                | Le prix du produit en euros          |
| picture     | VARCHAR(255)  | NULLABLE                                        | Chemin vers l'image du produit       |
| stock       | INT           | NOT NULL, DEFAULT 0                             | Nombre dispo en stock                |
| created_at  | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP, NOT NULL             | Date de création du produit (en BDD) |
| updated_at  | TIMESTAMP     | NULLABLE                                        | Date de dernière modif (en BDD)      |
| brand       | entity        | NOT NULL                                        | La marque du produit                 |
| category    | entity        | NOT NULL                                        | La catégorie du produit              |
| type        | entity        | NOT NULL                                        | Le type du produit                   |

## Catégories (`category`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la catégorie|
|name|VARCHAR(64)|NOT NULL|Le nom de la catégorie|
|subtitle|VARCHAR(64)|NULL|Le sous-titre/slogan de la catégorie|
|picture|VARCHAR(128)|NULL|L'URL de l'image de la catégorie (utilisée en home, par exemple)|
|order|TINYINT(1)|NOT NULL, DEFAULT 0|L'ordre d'affichage de la catégorie sur la home (0=pas affichée en home)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP, NOT NULL|La date de création de la catégorie|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la catégorie|

## Marque (`brand`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la marque|
|name|VARCHAR(64)|NOT NULL|Le nom de la marque|
|order|TINYINT(1)|NOT NULL, DEFAULT 0|L'ordre d'affichage de la marque dans le footer (0=pas affichée dans le footer)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP, NOT NULL|La date de création de la marque|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la marque|

## Type de produit (`type`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du type|
|name|VARCHAR(64)|NOT NULL|Le nom du type|
|order|TINYINT(1)|NOT NULL, DEFAULT 0|L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP, NOT NULL|La date de création du type|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du type|