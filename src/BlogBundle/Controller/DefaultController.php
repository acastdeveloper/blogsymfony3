<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /* PRIMERA PROVA, D'EXTREURE ATRIBUTS D'ENTRADA I FINS I TOT ATRIBUTS DE CATEGORIA
        $em = $this->getDoctrine()->getEntityManager();
        //Instancia un objecte del gestor d'entitats.
        $entry_repo = $em->getRepository("BlogBundle:Entry");
        //Instancia un objecte del repositori de la classe entry.

        $entries =$entry_repo->findAll();
        //Sembla l'equivalent a un SELECT *
        //Obté una matriu d'objectes.
        echo "<br>";

        foreach($entries as $entry) {
            echo "Títol: ".$entry->getTitle()."<br/>";
            echo "Categoria:".$entry->getCategory()->getName()."<br>";
            echo "Autor:".$entry->getUser()->getName();

            $tags =$entry->getEntryTag();
            foreach ($tags as $tag) {
                echo $tag->getTag()->getName().", ";
            }
            echo "<hr>";

        }
        */

        $em = $this->getDoctrine()->getEntityManager();
        //Instancia un objecte del gestor d'entitats.
        $category_repo = $em->getRepository("BlogBundle:Category");
        //Instancia un objecte del repositori de la classe category.
        $categories =$category_repo->findAll();
        //Sembla l'equivalent a un SELECT *
        //Obté una matriu d'objectes.
        echo "<br>";

        foreach($categories as $category) {
            echo $category->getName()."<br/>";

            $entries =$category->getEntries();
            foreach ($tags as $tag) {
                echo $tag->getTag()->getName().", ";
            }
            echo "<hr>";





        die();
        return $this->render('BlogBundle:Default:index.html.twig');
    }
}
