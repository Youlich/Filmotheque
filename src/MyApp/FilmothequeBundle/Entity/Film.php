<?php
namespace MyApp\FilmothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="MyApp\FilmothequeBundle\Repository\FilmRepository")
 * @ORM\Table(name="film")
 */
class Film
{
	/**
	 * @ORM\GeneratedValue
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $id;


	/**
	 * @ORM\Column(type="string",length=255)
	 */
	private $titre;

	/**
	 * @ORM\Column(type="string",length=500)
	 */
	private $description;

	/**
	 * @ORM\ManyToOne(targetEntity="Categorie")
	 */
	private $categorie;

	/**
	 * @ORM\ManyToMany(targetEntity="Acteur")
	 */
	private $acteurs;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getTitre() {
		return $this->titre;
	}

	/**
	 * @param mixed $titre
	 */
	public function setTitre( $titre ) {
		$this->titre = $titre;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription( $description ) {
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getCategorie() {
		return $this->categorie;
	}

	/**
	 * @param mixed $categorie
	 */
	public function setCategorie( $categorie ) {
		$this->categorie = $categorie;
	}

	/**
	 * @return mixed
	 */
	public function getActeurs() {
		return $this->acteurs;
	}

	/**
	 * @param mixed $acteurs
	 */
	public function setActeurs( $acteurs ) {
		$this->acteurs = $acteurs;
	}
}