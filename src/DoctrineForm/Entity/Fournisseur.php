<?php
namespace DoctrineForm\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * Fournisseurs
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity
 */
class Fournisseur
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
     * @ORM\Column(name="nom", type="string", length=64, nullable=false)
     * @Annotation\Attributes({"type":"text", "required":true})
     * @Annotation\Options({"label":"Nom"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=128, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Adresse"})
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_suite", type="string", length=128, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Adresse suite"})
     */
    private $adresseSuite;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=8, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Code Postal"})
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Ville"})
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=20, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Pays"})
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=128, nullable=true)
     * @Annotation\Type("Zend\Form\Element\Email")
     * @Annotation\Options({"label":"Email"})
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Télephone"})
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Fax"})
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_nom", type="string", length=64, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Nom du contact"})
     */
    private $contactNom;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_prenom", type="string", length=64, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Prénom du contact"})
     */
    private $contactPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_mail", type="string", length=64, nullable=true)
     * @Annotation\Type("Zend\Form\Element\Email")
     * @Annotation\Options({"label":"Mail du contact"})
     */
    private $contactMail;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_tel", type="string", length=20, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Télephone du contact"})
     */
    private $contactTel;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_fax", type="string", length=20, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Fax du contact"})
     */
    private $contactFax;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text", nullable=true)
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Commentaire"})
     */
    private $commentaires;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_client", type="integer", nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Numéro de client"})
     */
    private $numClient;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=100, nullable=true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Site Web"})
     */
    private $website;

   /**
     * @ORM\OneToMany(targetEntity="Marque", mappedBy="fournisseur")
     * @Annotation\Exclude 
     **/
    private $marques;    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->marques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Fournisseur
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
     * Set adresse
     *
     * @param string $adresse
     * @return Fournisseur
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
     * Set adresseSuite
     *
     * @param string $adresseSuite
     * @return Fournisseur
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

    /**
     * Set cp
     *
     * @param string $cp
     * @return Fournisseur
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
     * @return Fournisseur
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
     * @return Fournisseur
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
     * Set mail
     *
     * @param string $mail
     * @return Fournisseur
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
     * Set tel
     *
     * @param string $tel
     * @return Fournisseur
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
     * Set fax
     *
     * @param string $fax
     * @return Fournisseur
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
     * Set contactNom
     *
     * @param string $contactNom
     * @return Fournisseur
     */
    public function setContactNom($contactNom)
    {
        $this->contactNom = $contactNom;

        return $this;
    }

    /**
     * Get contactNom
     *
     * @return string 
     */
    public function getContactNom()
    {
        return $this->contactNom;
    }

    /**
     * Set contactPrenom
     *
     * @param string $contactPrenom
     * @return Fournisseur
     */
    public function setContactPrenom($contactPrenom)
    {
        $this->contactPrenom = $contactPrenom;

        return $this;
    }

    /**
     * Get contactPrenom
     *
     * @return string 
     */
    public function getContactPrenom()
    {
        return $this->contactPrenom;
    }

    /**
     * Set contactMail
     *
     * @param string $contactMail
     * @return Fournisseur
     */
    public function setContactMail($contactMail)
    {
        $this->contactMail = $contactMail;

        return $this;
    }

    /**
     * Get contactMail
     *
     * @return string 
     */
    public function getContactMail()
    {
        return $this->contactMail;
    }

    /**
     * Set contactTel
     *
     * @param string $contactTel
     * @return Fournisseur
     */
    public function setContactTel($contactTel)
    {
        $this->contactTel = $contactTel;

        return $this;
    }

    /**
     * Get contactTel
     *
     * @return string 
     */
    public function getContactTel()
    {
        return $this->contactTel;
    }

    /**
     * Set contactFax
     *
     * @param string $contactFax
     * @return Fournisseur
     */
    public function setContactFax($contactFax)
    {
        $this->contactFax = $contactFax;

        return $this;
    }

    /**
     * Get contactFax
     *
     * @return string 
     */
    public function getContactFax()
    {
        return $this->contactFax;
    }

    /**
     * Set commentaires
     *
     * @param string $commentaires
     * @return Fournisseur
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
     * Set numClient
     *
     * @param integer $numClient
     * @return Fournisseur
     */
    public function setNumClient($numClient)
    {
        $this->numClient = $numClient;

        return $this;
    }

    /**
     * Get numClient
     *
     * @return integer 
     */
    public function getNumClient()
    {
        return $this->numClient;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Fournisseur
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Add marques
     *
     * @param \Mco\McoBundle\Entity\Marque $marques
     * @return Fournisseur
     */
    public function addMarque(\Mco\Entity\Marque $marques)
    {
        $this->marques[] = $marques;

        return $this;
    }

    /**
     * Remove marques
     *
     * @param \Mco\McoBundle\Entity\Marque $marques
     */
    public function removeMarque(\Mco\Entity\Marque $marques)
    {
        $this->marques->removeElement($marques);
    }

    /**
     * Get marques
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMarques()
    {
        return $this->marques;
    }
    
    public function __toString(){
        return $this->getNom();
    }
}
