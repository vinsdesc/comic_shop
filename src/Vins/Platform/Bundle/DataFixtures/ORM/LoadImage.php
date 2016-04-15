<?php


namespace Vins\Platform\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vins\Platform\Bundle\Entity\Image;

class LoadImage implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $urls = array(
      'http://www.bedetheque.com/media/Couvertures/Couv_158918.jpg', 
      'http://www.bedetheque.com/media/Couvertures/WatchingWatchmenRecto_85092.jpg',
      'http://www.bedetheque.com/media/Couvertures/300.jpg', 
      'http://www.bedetheque.com/media/Couvertures/sincitycouv01.jpg'
    );

    $alts = array(
        'The boys',
        'Watchmen',
        '300',
        'Sin city'
      );

    foreach ($urls as $key => $url) {
      // On crée la catégorie
      $image = new Image();
      $image->setUrl($url);
      $image->setAlt($alts[$key]);

      // On la persiste
      $manager->persist($image);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}