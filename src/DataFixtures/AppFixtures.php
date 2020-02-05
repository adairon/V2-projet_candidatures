<?php

namespace App\DataFixtures;

use App\Entity\Etape;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // On va alimenter la table Etape avec des données :
        //On créé un tableau avec les étapes:
        $etapes = ['Candidature envoyée', 'Entretien à venir', 'Attente réponse', 'Candidature retenue', 'Candidature refusée'];
        $tabObjEtape=[];
        //On boucle pour chaque étape du tableau, on alimente un tableau d'objet avec les étapes et on enregistre dans la BDD persist puis flush
        foreach ($etapes as $step){
            $etape = new Etape();
            $etape -> setEtape($step);
            $tabObjEtape[]=$etape;
            $manager -> persist($etape);
        }

        $manager->flush();
    }
}
