<?php

namespace MyApp\FilmothequeBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\FilmothequeBundle\Entity\Acteur;
use MyApp\FilmothequeBundle\Form\ActeurType;


class ActeurController extends Controller
{
	public function listerAction()
	{
		$em = $this->getDoctrine()->getManager();

		$acteurs= $em->getRepository('MyAppFilmothequeBundle:Acteur')->findAll();

		return $this->render('MyAppFilmothequeBundle:Acteur:lister.html.twig',
			array(
				'acteurs' => $acteurs
			));

	}

	/**
	 * @param null $id
	 * @param Request $request
	 *
	 * @return Response
	 */

	public function editerAction($id = null, Request $request)
	{
		$message='';

		if (isset($id))
		{
			// modification d'un acteur existant : on recherche ses données
			$acteur = $this->getDoctrine()
			               ->getManager()
			               ->find('MyAppFilmothequeBundle:Acteur', $id);


			if (!$acteur)
			{
				$message='Aucun acteur trouvé';
			}
		}
		else
		{
			// ajout d'un nouvel acteur
			$acteur = new Acteur();
		}

		$form   = $this->createForm(ActeurType::class, $acteur);
		//lier le formulaire à la requête à la soumission
		$form->handleRequest($request);

		//si le formulaire a été soumis
		if ($form->isSubmitted()) {

			//si le formulaire est valide : cad les données saisies correspondent aux contraintes assert
			if ( $form->isValid() ) {
				//on enregistre le produit en Bdd
				$acteur->setUpdatedAt(new \DateTime());
				$em = $this->getDoctrine()->getManager();
				$em->persist($acteur);
				$em->flush();
				if (isset($id))
				{
					$request->getSession()->getFlashBag()->add('info', 'Acteur modifié avec succès');

					// Puis on redirige vers la liste des acteurs
					$acteurs= $em->getRepository('MyAppFilmothequeBundle:Acteur')->findAll();
					return $this->redirectToRoute('myapp_acteur_lister', array(
						'acteurs' => $acteurs
					));


				}
				else
				{
					$request->getSession()->getFlashBag()->add('info', 'Acteur ajouté avec succès');

					// Puis on redirige vers la liste des acteurs
					$acteurs= $em->getRepository('MyAppFilmothequeBundle:Acteur')->findAll();
					return $this->render('MyAppFilmothequeBundle:Acteur:lister.html.twig', array(
						'acteurs' => $acteurs
					));
				}
			}
		}
        //on génère le formulaire
		return $this->render('MyAppFilmothequeBundle:Acteur:editer.html.twig',array(
			'form' => $form->createView(),
			'message' => $message,
		));
	}



	public function supprimerAction($id, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$acteur = $em->find('MyAppFilmothequeBundle:Acteur', $id);

		if (!$acteur)
		{
			throw new NotFoundHttpException("Acteur non trouvé");
		}

		$em->remove($acteur);
		$em->flush();

		$request->getSession()->getFlashBag()->add('info', 'Acteur supprimé avec succès');

		// Puis on redirige vers la liste des acteurs
		$acteurs= $em->getRepository('MyAppFilmothequeBundle:Acteur')->findAll();
		return $this->render('MyAppFilmothequeBundle:Acteur:lister.html.twig', array(
			'acteurs' => $acteurs
		));
	}


}