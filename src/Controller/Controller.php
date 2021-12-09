<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Panier;
use App\Entity\Produits;
use App\Entity\Categorie;
use App\Repository\UsersRepository;
use App\Repository\ProduitsRepository;
use App\Repository\CategorieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\BrowserKit\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Controller extends AbstractController
{


    /**
     * @Route("/Categorie" , name="Categorie")
     */
    public function Categorie(Request $request, PaginatorInterface $paginator)
    {
      
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
            
        /*
        $categorie = $paginator->paginate(
            $donnes, 
            $request->query->getInt('page',1),
            5
        );
       */
        
        foreach ($categorie as $key => $categorie) {
            $data[$key]['nom'] = $categorie->getNom();
        }
        return new JsonResponse($data);
    }


    /**
     * @Route("/Produits" , name="Produits")
     */
    public function Produits(Request $request, PaginatorInterface $paginator)
    {
        $produits = $this->getDoctrine()
            ->getRepository(Produits::class)
            ->findAll();
        /*
         $produits = $paginator->paginate(
                $donnes, 
                $request->query->getInt('page',1),
                5
            );
            */
        foreach ($produits  as $key => $produits) {

            $data[$key]['nom'] = $produits->getNom();
            $data[$key]['prix'] = $produits->getPrix();
            $data[$key]['categorie'] = $produits->getCategorie()->getNom();
        }
        return new JsonResponse($data);
    }


    /**
     * @Route("/AddProduitsPanier/{id}" , name="AddProduitsPanier")
     */
    public function AddProduitsPanier(ProduitsRepository $produit,UsersRepository $user ,ManagerRegistry $doctrine , $id)
    {
       
        $panier = new Panier();
        $entityManager = $doctrine->getManager();
        $panier->setUser($user->find($id));
        $panier->setProduits($produit->find($id));
        $panier->setStatus('Acheté');
        $entityManager->persist($panier);
        $entityManager->flush();

        return new Response('ok');
    }
}
