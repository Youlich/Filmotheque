<?php

namespace MyApp\FilmothequeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\FilmothequeBundle\Entity\Categorie;

class DefaultController extends Controller
{


	public function indexAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$categories = $em->getRepository('MyAppFilmothequeBundle:Categorie')->findAll();

		return $this->render('MyAppFilmothequeBundle:Default:index.html.twig',array(
				'categories' => $categories)
		);
	}


	public function enregistrerCategorie()
	{

		$em = $this->getDoctrine()->getEntityManager();
		$categorie1 = new Categorie();
		$categorie1->setNom('Comédie');
		$em->persist($categorie1);

		$categorie2 = new Categorie();
		$categorie2->setNom('Science-fiction');
		$em->persist($categorie2);

		$em->flush();

		$message = 'Catégories créées avec succès';
		return $this->render('MyAppFilmothequeBundle:Default:index.html.twig',
			array('message' => $message)
		);
	}
}
