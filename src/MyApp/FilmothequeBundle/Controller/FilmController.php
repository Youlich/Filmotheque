<?php

namespace MyApp\FilmothequeBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\FilmothequeBundle\Entity\Film;
use MyApp\FilmothequeBundle\Form\ActeurType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class FilmController extends Controller
{

	public function listerAction()
	{
		$em = $this->getDoctrine()->getManager();

		$films= $em->getRepository('MyAppFilmothequeBundle:Film')->findAll();

		return $this->render('MyAppFilmothequeBundle:Film:lister.html.twig',
			array(
				'films' => $films
			));

	}

    public function menuAction()
    {
    $em = $this->getDoctrine()->getManager();

    $listFilms = $em->getRepository('MyAppFilmothequeBundle:Film')->findAll();

    return $this->render('MyAppFilmothequeBundle:Film:menu.html.twig', array(
    'listFilms' => $listFilms
    ));
    }
}