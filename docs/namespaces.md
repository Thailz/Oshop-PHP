# Namespace

Un namespace est un "dossier virtuel" dans lequel est rangé une classe

 - Permet d'avoir plusieurs classes avec un même nom
 - De regrouper des classes similaires (ou ayant un rapport logique)
 - Par défaut, TOUTES les classe sont dans le namespace "racine" => \
 - Le séparateur de "dossiers virtuels" est lui aussi un antislash ( \ )
 - Le namespace d'une classe se déclare TOUT EN HAUT de la classe ( avant class Xxxx )
 - Ne s'applique qu'au fichier dans lequel il est déclaré

## Placer une classe dans un _Namespace_

Dans cet exemple, la classe Joconde est "rangée" dans le "dossier virtuel" `Terre\Europe\France\Paris\Louvre`
 ```php
<?php

namespace Terre\Europe\France\Paris\Louvre;

class Joconde {
    // [...]

    public function smile() {
        // [...]
    }
}
```

:warning: Attention !  
Toute classe "utilisée" dans ce code ^ sera considéré comme faisant partie du _Namespace_ de la classe (on pourrait comparer ça à un chemin relatif)

```php
<?php

namespace Terre\Europe\France\Paris\Louvre;

class Joconde {
    // [...]

    public function smile() {
        // [...]
        $this->mouth = new Mouth(); // => \Terre\Europe\France\Paris\Louvre\Mouth
    }
}
```

Pour éviter ce problème, on va utiliser ce qu'on appelle le FQCN d'une classe (on pourrait comparer ça au chemin absolu vers cette classe).

### Fully Qualified Class Name

C'est le "chemin absolu" de la classe => namespace + nom de la classe

```php
<?php

$originale  = new \Terre\Europe\France\Paris\LibertyStatue();
$pale_copie = new \Terre\Amerique\US\NewYork\LibertyStatue();

// Actuellement dans oShop :
$modelBrand = new \Brand();
```

### Mot-clé `use`

Dés qu'on utilise notre classe au moins deux fois dans un même fichier PHP, il serait intéressant de ne pas avoir a retaper tout le FCQN en entier.

 - Pour ça, on va utiliser le mot-clé `use`
 - Comme `namespace`, `use` n'est valable que pour fichier courant
 - Le premier `\` est donc optionnel (car implicite)
 - Il se place APRES le mot-clé `namespace` mais AVANT le mot clé `class`


:warning: Attention, si deux classes portant le même nom se retrouvent utilisée a cause de use, PHP ne saura pas laquelle
```php
<?php

use Terre\Europe\France\Paris\LibertyStatue;
use Terre\Amerique\US\NewYork\LibertyStatue;

$originale  = new LibertyStatue();
$pale_copie = new LibertyStatue();

// => Erreur, classe LibertyStatue ambigue

```

# Classes natives PHP et autres

Toutes les classes natives de PHP ne sont dans aucun namespace.
Donc, comme pour les notres, elle se retrouvent à la racine des namespaces ( `\` )

Exemple de l'infini :
```php
<?php

namespace Terre\Europe\France\Paris\Louvre;

use Animals\Human\Face\Mouth;

class Joconde {
    // [...]

    public function smile() {
        // [...]
        $mouth = new Mouth(); // => \Animals\Human\Face\Mouth

        // Utilisation de la classe PDO, native à PHP (donc hors namespace)
        $pdo = new \PDO();
    }
}
```