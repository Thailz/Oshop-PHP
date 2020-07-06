<?php

    class Vehicle 
    {
        private $id;
        private $name;
        private $speed;
        private $brand;
        // ....

        private $wheels;
    }

    class Car extends Vehicle
    {
        // Sans avoir a les spécifier explicitement
        // la clase Car possède les même attributs que
        // sa classe mère, Vehicle

        // Par contre, elle possède des attributs spécifiques
        private $reservoir; // Capacité du réservoir en litre

        // On peut "écraser" (on par d'override) les propriétés du parent
        // ici, on donne une valeur par défaut de 4 à la propriété wheels
        private $wheels = 4;
    }

    class Bicycle extends Vehicle
    {
        // Ici Bicycle hérite de Vehicle
        // Donc Bicycle, possède les attributs (et les méthodes)
        // de Vehicle (name, speed,  ...)
        // en plus des siennes définies plus bas
        private $guidon_type;
        private $wheels = 2;
    }

    class Bus extends Car
    {
        // Ici Bus hérite de Car, qui elle même hérite de Vehicle
        // Donc Bus, possède les attributs (et les méthodes)
        // de tout ses ancêtres (name, speed, reservoir, ...)
        private $wheels = 6;
    }

    class Tank extends Vehicle
    {
        
    }