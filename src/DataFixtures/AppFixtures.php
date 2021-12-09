<?php
namespace App\DataFixtures;
use App\Entity\Categorie;
use App\Entity\Produits;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i<20; $i++){
         $categorie= new Categorie();
         //$user = new Users();
         $categorie->setNom("catégorie n°". $i);
        // $user->setNom("Rami" . $i);
         $manager->persist($categorie);
         $produits= new Produits();
         $produits->setNom("produit n°". $i);
         $produits->setPrix(rand(100,1000));
         $produits->setCategorie($categorie);
         //$produits->setUser($user);
         $manager->persist($produits);
           }
           $manager->flush();
    }
}
