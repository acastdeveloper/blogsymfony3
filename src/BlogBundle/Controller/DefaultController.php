<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        //Instancia un objecte del gestor d'entitats.
        $entry_repo = $em->getRepository("BlogBundle:Entry");
        //Instancia un objecte del repositori de la classe entry.

        $entries =$entry_repo->findAll();
        //Sembla l'equivalent a un SELECT *
        //Obté una matriu d'objectes.

        foreach($entries as $entry) {
            echo "Títol: ".$entry->getTitle()."<br/>";
            echo "Categoria:".$entry->getCategory()->getName()."<br>";
            echo "Autor:".$entry->getUser()->getName()."<hr>";

            $tags =$entry->getEntryTag();
            foreach ($tags as $tag) {
                echo $tag->getTag()->getName().", ";
            }

        }
        die();


        return $this->render('BlogBundle:Default:index.html.twig');
    }
}
