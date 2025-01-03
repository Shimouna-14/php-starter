<?php
    // echo "ça marche";

    //Variables & constantes
    $nom = "Joey";
    // echo $nom;

    const SURNAME = "Joe";
    // echo $nom . " " . SURNAME;

    // Types
    /*
        - String = "Hello"
        - Integer = 20
        - Float = 20.56436
        - Decimal(5,2) = 999.99
        - Boolean = true/false
        - Array = ["Hello", 20, 20.56436, 999.99, true]
        - Object = new stdClass()
        - Text, varchar = Pour BDD
    */

    // Fonctions
    function totalTva(
    int $ht,
    int $tva,
    int $qt,
    ?int $promo) : int
    {
        $totalHt = $ht * $qt;
        // Condition
        if ($promo > 0) { $totalHt = $totalHt * $promo;}
        $totalTva = $totalHt * $tva / 100;
        return $totalTva + $totalHt;
    }
    // echo totalTva(20, 20, 2, 0);

    // Conditions
    if (1 == 0) {
        echo "Le monde est sous l'eau";
    }

    $date = new DateTime('now');
    $annee = $date->format('Y');
    // echo gettype($annee) . '<br/>';
    // echo $annee === 2025 ? "Bonne année 2025" :  "Ce n'est pas encore l'année 2025";

    // Classes & Objets
    class User {
        // Attribut/Propriété/Variable
        public string $nom;
        public string $prenom;
        public string $metier;

        // Mutateur = Setters / function = Methodes
        public function setNom(string $nom)
        {
            // Référence à l'objet en cours
            $this->nom = $nom;
            return $this; //Retourner l'information
        }
        public function setPrenom(string $prenom)
        {
            $this->prenom = $prenom;
            return $this;
        }
        public function setMetier(string $metier)
        {
            $this->metier = $metier;
            return $this;
        }
    }

    $user = new User();
    $user
        -> setNom("Sam")
        -> setPrenom("Joe")
        -> setMetier("Mecanicien")
    ;
    var_dump($user);



?>