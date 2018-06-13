<?php
namespace MyApp\FilmothequeBundle\Entity;


use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="MyApp\FilmothequeBundle\Repository\ActeurRepository")
 * @ORM\Table(name="acteur")
 *
 */
class Acteur
{
	/**
	 * @ORM\GeneratedValue
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string",length=255)
	 *@Assert\NotBlank(message = "Le champ nom est obligatoire")
	 */
	private $nom;

	/**
	 *
	 * @ORM\Column(type="string",length=255)
	 * @Assert\NotBlank(message = "Le champ prénom est obligatoire")
	 */
	private $prenom;

	/**
	 * @ORM\Column(type="date")
	 * @Assert\NotBlank(message = "Le champ date est obligatoire")
	 */
	private $dateNaissance;

	/**
	 * @ORM\Column(type="string",length=1)
	 */
	private $sexe;

	/**
	 * @ORM\OneToOne(targetEntity="MyApp\FilmothequeBundle\Entity\Image", cascade={"persist", "remove"})
	 */
	private $image;

	/**
	 * @ORM\Column(name="updated_at", type="datetime", nullable=true)
	 */
	private $updatedAt;

	/**
	 * @ORM\ManyToMany(targetEntity="MyApp\FilmothequeBundle\Entity\Film", cascade={"persist"})
	 * @ORM\JoinTable(name="myapp_acteur_film")
	 */
	private $films;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom( $nom ) {
		$this->nom = $nom;
	}

	/**
	 * @return mixed
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * @param mixed $prenom
	 */
	public function setPrenom( $prenom ) {
		$this->prenom = $prenom;
	}

	/**
	 * @return mixed
	 */
	public function getDateNaissance() {
		return $this->dateNaissance;
	}

	/**
	 * @param mixed $dateNaissance
	 */
	public function setDateNaissance( $dateNaissance ) {
		$this->dateNaissance = $dateNaissance;
	}

	/**
	 * @return mixed
	 */
	public function getSexe() {
		return $this->sexe;
	}

	/**
	 * @param mixed $sexe
	 */
	public function setSexe( $sexe ) {
		$this->sexe = $sexe;
	}

	/**
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param mixed $image
	 */
	public function setImage( $image ) {
		$this->image = $image;
	}

	/**
	 * @return mixed
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * @param mixed $updatedAt
	 */
	public function setUpdatedAt( $updatedAt ) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * @return mixed
	 */
	public function getFilms() {
		return $this->films;
	}

	/**
	 * @param mixed $films
	 */
	public function setFilms( $films ) {
		$this->films = $films;
	}


}