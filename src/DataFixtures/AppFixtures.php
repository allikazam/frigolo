<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ingredients =  [
            "baking powder",
            "eggs",
            "all-purpose flour",
            "raisins",
            "milk",
            "white sugar",
            "sugar",
            "egg yolks",
            "corn starch",
            "cream of tartar",
            "bananas",
            "vanilla wafers",
            "milk",
            "vanilla extract",
            "toasted pecans",
            "egg whites",
            "light rum",
            "sausage links",
            "fennel bulb",
            "fronds",
            "olive oil",
            "cuban peppers",
            "onions",
            "meat cuts",
            "file powder",
            "smoked sausage",
            "okra",
            "shrimp",
            "andouille sausage",
            "water",
            "paprika",
            "hot sauce",
            "garlic cloves",
            "browning",
            "lump crab meat",
            "vegetable oil",
            "all-purpose flour",
            "freshly ground pepper",
            "flat leaf parsley",
            "boneless chicken skinless thigh",
            "dried thyme",
            "white rice",
            "yellow onion",
            "ham",
        ];
        foreach ($ingredients as $ing) {
            $ingredient = new Ingredient();
            $ingredient->setName($ing);
            $ingredient->setQuantity(random_int(2, 100));

            // Génère un entier aléatoire compris entre 0 et 30
            $randomDays = random_int(0, 30);

            // Crée une date aléatoire en ajoutant le nombre aléatoire de jours à la date actuelle
            $randomDate = new \DateTime();
            $randomDate->add(new \DateInterval("P{$randomDays}D"));

            // Définit la propriété dateEnd de l'objet Ingredient avec la date aléatoire
            $ingredient->setDateEnd('$randomDate');
            $ingredient->setType('typeIngredient');
            $manager->persist($ingredient);
        }
        $manager->flush();
    }
}
