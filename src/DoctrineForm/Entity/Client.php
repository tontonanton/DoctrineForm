<?php

namespace DoctrineForm\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * Clients
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 * @ORM\HasLifeCycleCallbacks
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Annotation\Attributes({"type":"hidden"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=10, nullable=false)
     * @Annotation\Attributes({"type":"text", "required":true})
     * @Annotation\Options({"label":"civilité"})	 	 
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     * @Annotation\Attributes({"type":"text", "required":true})
     * @Annotation\Options({"label":"Nom"})	 
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=true)
     * @Annotation\Attributes({"type":"text", "required":true})
     * @Annotation\Options({"label":"Prénom"})	 
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Nom"})
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_suite", type="text", nullable=true)
     */
    private $adresseSuite;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=8, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Code Postal"})
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Ville"})
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=30, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Pays"})
     */
    private $pays;


    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"telephone"})	 
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=16, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Tel Portable"})
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Fax"})	 
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=30, nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"Zend\Form\Element\Mail"})
     * @Annotation\Options({"label":"Email"})
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text", nullable=true)
	 * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Commentaire"})	 
     */
    private $commentaires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=false)
     */
    private $dateCreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

	/**
	* @var \ArrayCollection
	* 
	* @ORM\OneToMany(targetEntity = "Vente", mappedBy="client")
	*/
	private $ventes;
	
    /**
     * Get idClient
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     * @return Clients
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Clients
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Clients
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Clients
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Clients
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Clients
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Clients
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Clients
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Clients
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Clients
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Clients
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set commentaires
     *
     * @param string $commentaires
     * @return Clients
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return string 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set dateCreation
     *
	 * @ORM\PrePersist
     * @param \DateTime $dateCreation
     * @return Clients
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set famille
     *
     * @param string $famille
     * @return Clients
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string 
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set age
     *
     * @param \integer $dateNaiss
     * @return Client
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set adresseSuite
     *
     * @param string $adresseSuite
     * @return Client
     */
    public function setAdresseSuite($adresseSuite)
    {
        $this->adresseSuite = $adresseSuite;

        return $this;
    }

    /**
     * Get adresseSuite
     *
     * @return string 
     */
    public function getAdresseSuite()
    {
        return $this->adresseSuite;
    }
	
	public function getVentes(){
		return $this->ventes;
	}
	
	/**
	* @ORM\PrePersist()
	*/
	public function checkDateCreation(){
		if (in_array($this->getDateCreation(), array('',null)))
			$this->setDatecreation(new \Datetime());
	}
	

    public function __construct(){
        $this->ventes=new ArrayCollection();

    }
}
