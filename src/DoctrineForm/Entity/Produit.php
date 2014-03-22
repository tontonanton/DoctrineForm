<?php

namespace DoctrineForm\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks 
 * @Annotation\Name("Produit")
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Annotation\Attributes({"type":"hidden"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=32, nullable=false)
     * @Annotation\Required(true)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Référence"})
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255, nullable=false)
     */
    private $designation;

    /**
     * @var float
     *
     * @ORM\Column(name="achat", type="float", precision=10, scale=0, nullable=false)
     * @Annotation\Attributes({"type":"text", "required":"true"})
     * @Annotation\Options({"label":"Prix d'achat"})
     */
    private $achat;

    /**
     * @var float
     *
     * @ORM\Column(name="ht", type="float", precision=10, scale=0, nullable=false)
     * @Annotation\Attributes({"type":"text", "required":"true"})
     * @Annotation\Options({"label":"Prix Hors Taxe"})
     */
    private $ht;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     * @Annotation\Attributes({"type":"text", "required":"true"})
     * @Annotation\Options({"label":"Stock"})
     */
    private $stock;
    
    /**
     * @var \Marque
     *
     * @ORM\ManyToOne(targetEntity="Marque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marque_id", referencedColumnName="id")
     * })
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"datas_source":"Marque"})
     * @Annotation\Options({"label":"Marque"})
     */
    private $marque;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"datas_source":"Categorie"})
     * @Annotation\Options({"label":"Catégorie"})
     */
    private $categorie;

    /**
     * @var \Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     * })
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"datas_source":"Matiere"})
     * @Annotation\Options({"label":"Matiere"})
     */
    private $matiere;

    /**
     * @var \TypeMonture
     *
     * @ORM\ManyToOne(targetEntity="TypeMonture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeMonture_id", referencedColumnName="id")
     * })
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"datas_source":"TypeMonture"})
     * @Annotation\Options({"label":"Type de monture"})
     */
    private $typeMonture;
    
    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=32, nullable=true)
     * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text", "required":"false"})
     * @Annotation\Options({"label":"Taille"})
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=32, nullable=true)
     * @Annotation\Required(false)
     * @Annotation\Attributes({"type":"text", "required":"false"})
     * @Annotation\Options({"label":"Couleur"})
     */
    private $couleur;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     * })
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"datas_source":"Genre"})
     * @Annotation\Options({"label":"Sexe"})
     */
    private $genre;
    
	/**
	* @ORM\Column(name="tvaFactor", type="float", precision=10,scale=0, nullable=false)
	* @Annotation\Required(true)
	* @Annotation\Attributes({"type":"float"})
	* @Annotation\Options({"label":"Taux de Tva"})
	* Sera diffusée d'ici dans tous les usages du produit
	*/
	protected $tvaFactor;

    /**
    * Ventes de ce produit 
    *
    * @ORM\OneToMany(targetEntity="VenteProduit", mappedBy="produit")
    * @Annotation\Exclude     
    */
    protected $ventes;

	/**
	* Champs calculé
    * @Annotation\Exclude     
	*/
	protected $ttc;
	
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
     * Set reference
     *
     * @param string $reference
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set designation
     *
     * @param string $designation
     * @return Produit
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string 
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set taille
     *
     * @param string $taille
     * @return Produit
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     * @return Produit
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set achat
     *
     * @param float $achat
     * @return Produit
     */
    public function setAchat($achat)
    {
        $this->achat = $achat;

        return $this;
    }

    /**
     * Get achat
     *
     * @return float 
     */
    public function getAchat()
    {
        return $this->achat;
    }

    /**
     * Set vente
     * VALEUR HT
     * @param float $vente
     * @return Produit
     */
    public function setHt($vente)
    {
        $this->ht = $vente;

        return $this;
    }

    /**
     * Get vente
     *
     * @return float 
     */
    public function getHt()
    {
        return $this->ht;
    }
	
	/**
	* @return float
	*/
	public function getTtc(){
		return $this->getHt() * (1 + $this->getTvaFactor());
	}

    /**
    * @return float
    */
    public function setTtc($ttc){
        $this->ttc = $ttc;
        return $this;
    }

	
    /**
     * Set stock
     *
     * @param integer $stock
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set genre
     *
     * @param Genre $genre
     * @return Produit
     */
    public function setGenre($genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return Genre 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set marque
     *
     * @param Marque $marque
     * @return Produit
     */
    public function setMarque($marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \Mco\Entity\Marque 
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set categorie
     *
     * @param Categorie $categorie
     * @return Produit
     */
    public function setCategorie($categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Mco\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set matiere
     *
     * @param Matiere $matiere
     * @return Produit
     */
    public function setMatiere($matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \Mco\Entity\Matiere 
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set typeMonture
     *
     * @param TypeMonture $typeMonture
     * @return Produit
     */
    public function setTypeMonture($typeMonture = null)
    {
        $this->typeMonture = $typeMonture;
        return $this;
    }

    /**
     * Get typeMonture
     *
     * @return \Mco\Entity\TypeMonture 
     */
    public function getTypeMonture()
    {
        return $this->typeMonture;
    }
	
    /**
    * Taux de TVA
    */
    public function getTvaFactor(){
        return $this->tvaFactor*100;
    }

    /**
    * Definit le taux de tva
    * Transforme entrée genre 15 en 0.15
    */
    public function setTvaFactor($tva){
        if ($tva >= 1){
            $this->tvaFactor=$tva/100;
        }else{
            $this->tvaFactor=$tva;
        }
        return $this;
    }
	
    public function getVentes(){
        return $this->ventes;
    }

    public function __toString(){
        return (string) $this->getDesignation();
    }
	
    /**
    * @ORM\PrePersist
    */
    public function defineDesignation(){
            if ($this->getDesignation()!== '' and $this->getDesignation()!== null){
                return ;
            }
            
            $chaine = $this->getCategorie()->__toString() . ' ' . $this->getTypeMonture()->__toString() . ' ' . $this->getMatiere()->__toString() . ' ' . $this->getGenre()->__toString();
            $chaine = str_replace($chaine,"  "," ");
            $this->setDesignation($chaine);
    }

    public function __construct(){
        $this->ventes=new ArrayCollection();
    }
}
