# Requêtes O'shop

## Récupérer la liste des catégories de la page d'accueil
```sql
SELECT * FROM `category` WHERE `order` > 0 ORDER BY `order` ASC LIMIT 5
```

## Récupération des types de produits pour la liste du footer
```sql
SELECT `id`, `name`, `order` FROM `type` WHERE `order` > 0 ORDER BY `order` ASC LIMIT 5
```

## Récupération des marques pour la liste du footer
```sql
SELECT `id`, `name`, `order` FROM `brand` WHERE `order` > 0 ORDER BY `order` ASC LIMIT 5
```

## Récupération d'une catégorie spécifique
```sql
SELECT * FROM `category` WHERE `id` = '$this->id' LIMIT 1
```

## Récupération d'un type spécifique
```sql
SELECT * FROM `type` WHERE `id` = '$this->id' LIMIT 1
```

## Récupération d'une marque spécifique
```sql
SELECT * FROM `brand` WHERE `id` = '$this->id' LIMIT 1
```

## Récupération des produits d'une catégorie donnée
```sql
SELECT `products`.*, `type`.`name` AS type_name 
FROM `products` 
    INNER JOIN `type` ON `type`.`id` = `products`.`type_id`
WHERE `category_id` = '$this->category_id' 
LIMIT '$limit'
```

## Récupération des produits d'une marque donnée
```sql
SELECT `products`.*, `type`.`name` AS type_name 
FROM `products` 
    INNER JOIN `type` ON `type`.`id` = `products`.`type_id`
WHERE `brand_id` = '$this->brand_id' 
LIMIT '$limit'
```

## Récupération des produits d'un type donné
```sql
SELECT `products`.*, `type`.`name` AS type_name 
FROM `products` 
    INNER JOIN `type` ON `type`.`id` = `products`.`type_id`
WHERE `type_id` = '$this->type_id' 
LIMIT '$limit'
```

## Récupération de TOUTES les infos d'un produit donné
```sql
SELECT `products`.*, 
       `type`.`name`     AS type_name, 
       `brand`.`name`    AS brand_name, 
       `category`.`name` AS category_name 
FROM `products` 
    INNER JOIN `type`     ON `type`.`id`     = `products`.`type_id`
    INNER JOIN `brand`    ON `brand`.`id`    = `products`.`brand_id`
    INNER JOIN `category` ON `category`.`id` = `products`.`category_id`
WHERE `products`.`id` = '$this->id'
LIMIT '$limit'
```

Petit point rapide sur les jointures :
 - Elles permettent de récupérér des données dans d'autres tables que celle définie dans le FROM dans une seule requête
 - Elles sont généralement utilisées pour représenter les relations entre les entités
 - Elles s'utilisent comme suit : INNER JOIN `table_jointure` ON `table_jointure`.`clé_primaire` = `table_from`.`clé_étrangère`
 - Il faut également penser a récupérer les données de cette jointure dans nos résultats :
    Dans le SELECT, préciser `table_jointure`.`champ_joint` AS nom_au_choix
 - De cette façon, la valeur du champ sera disponible dans le tableau associatif des résultats de la requete, à la clé "nom_au_choix". On appelle ça un alias.

Précautions à prendre :
 - Bien spécifier les tables pour chacun des champs, pour éviter les doublons (si les deux tables ont un champ qui porte le même nom, ex : `products`.`name` et `brand`.`name` )
 - Ne pas mélanger le WHERE et les JOIN, le WHERE permet de filtrer les résultats là ou le JOIN permet de récupérer des informations dans d'autres tables.

Requête d'exemple avec jointure simple : 
```sql
SELECT `table_from`.*, `table_jointure`.`champ_joint` AS nom_alias
FROM `table_from` 
    INNER JOIN `table_jointure` ON `table_jointure`.`cle_primaire_jointure` = `table_from`.`cle_etrangere_from`
WHERE `table_from`.`cle_primaire_from` = 'valeur_variable_PHP'
```