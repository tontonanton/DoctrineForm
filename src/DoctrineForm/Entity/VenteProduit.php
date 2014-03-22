<?php 
namespace DoctrineForm\Entity;

use DoctrineForm\Entity\Produit;
use DoctrineForm\Entity\Vente;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
* Quand une remise numerique est faite conjointementà une remise % sur un produit, la numerique est appliquée en premier
* Le produit a ainsi un % de remise plus faible en argent, la valeur du % diminuant
*	@TODO : laisser le choix au vendeur de choisir l'ordre remisé
*
*
* @ORM\Table(name="vente_produit")
* @ORM\Entity
* @ORM\HasLifecycleCallbacks
*/
class VenteProduit{
	/** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="string") */
	protected $id;

	/**
	* @ORM\ManyToOne(targetEntity ="Vente", inversedBy="produits")
	*/
	protected $vente;
	
	/**
	* Ne mene que vers un produit, c est le detail de chaque article vendu
	* @ORM\ManyToOne(targetEntity = "Produit", inversedBy="ventes")
	*/
	protected $produit;
	
	/**
	* @ORM\Column(name="prixAchat", type="float", nullable=false)
	*/
	protected $prixAchat;

	/**
	* @ORM\Column(name="prixVente", type="float", nullable=false)
	*/
	protected $prixVente;

	/**
	* @ORM\Column(name="remisePcent", type="float", nullable=true)
	*/
	protected $remisePcent;
	
	/**
	* @ORM\Column(name="remiseNumerique", type="float", nullable=true)
	*/
	protected $remiseNumerique;	
	
	/**
	* @ORM\Column(name="quantite", type="integer", nullable=false)
	*/
	protected $quantite;
	
	/**
	* Quantite monetaire de remise sur l'article (calculé)
	* @ORM\Column(name="remise", type="float", nullable=false)
	*/
	protected $totalRemise;	
	
	/**
	* @ORM\Column(name="totalHt", type="float", nullable=false)
	*/
	protected $ht;

	/**
	* Champs calculé, fonction HT et TVA a laquelle le produit est assujeti
	* @ORM\Column(name="tva", type="float", nullable=false)
	*/
	protected $tva;

	/**
	* @ORM\Column(name="ttc", type="float", nullable=false)
	*/
	protected $ttc;
	
	public function __construct(){
		// affectation brute, evite traitement d'affectation normale
		$this->quantity=0;
	}
	
	/**
	* Retourne un string qui decrit le produit vendu
	* Va s'appuyer sur le produit associé depuis le stock
	*/
	public function __toString(){
		return $this->getProduit()->__toString();
	}
	
	/**
	* Return Vente
	*/
	public function getVente(){
		return $this->vente;
	}
	
	public function setVente(Vente $vente){
		$this->vente=$vente;
		return $this;
	}
	
	public function getProduit(){
		return $this->produit;
	}

	public function setProduit(Produit $produit){
		$this->produit=$produit;
		$this->setPrixAchat($produit->getAchat());
		$this->setPrixVente($produit->getVente());
	}
	
	public function getPrixAchat(){
		return $this->prixAchat;
	}
	
	public function setPrixAchat($achat){
		$this->prixAchat = $achat;
		return $this;
	}
	
	/**
	* Return float prix de vente ht du produit
	*/
	public function getPrixVente(){
		return $this->prixVente;
	}
	
	public function setPrixVente($vente){
		$this->prixVente=$vente;
		return $this;		
	}
	
	public function setRemisePcent($remise){
		$this->remisePcent = $remise;
		return $this;
	}
	
	public function getRemisePcent(){
		return $this->remisePcent;
	}
	
	public function setRemiseNumerique($remiseNumerique){
		$this->remiseNumerique = $remiseNumerique;
		return $this;
	}
	
	public function getRemiseNumerique(){
		return $this->remiseNumerique;
	}
	
	/**
	* Attention lors des updates
	* Le produit associé va voir son stock diminué OU augmenté si updfate de cette valeur
	*/
	public function setQuantite($q){
		/**
		* On restocke le produit de la quantité initialiement saisie
		*/
		$p = $this->getProduit();
		$p->setStock($p->getStock() + $this->getQuantite());
		
		/**
		* On destocke le produit de la quantité saisie maintenant
		*/
		$p->setStock($p->getStock() - $q);
		$this->quantite = $q;
		return $this;
	}
	
	public function getQuantite(){
		return $this->quantite;
	}
	
	public function getHt(){
		return $this->ht;
	}
	
	public function setHt($ht){
		$this->ht=$ht;
		return $this;
	}
	
	public function getTva(){
		return $this->tva;
	}
	
	public function setTva($tva){
		$this->tva=$tva;
		return $this;
	}
	
	public function getTtc(){
		return $this->ttc;
	}
	
	public function setTtc($ttc){
		$this->ttc=$ttc;
		return $this;
	}
	
	/**
	* Retourne montant numerique de la remise
	*/
	public function setTotalRemise($remise){
		$this->totalRemise=$remise;
		return $this;
	} 
	
	public function getTotalRemise(){
		return $this->totalRemise;
	}
	
	/**
	* @ORM\PrePersist
	*/
	public function calcul(){
		$htInitial = $this->getPrixVente() * $this->getQuantite();
		$htInitialMoinsRemiseNumerique = $htInitial - $this->getRemiseNumerique();

		// Hors Taxe Remisé
		$prixRemise = $htInitialMoinsRemiseNumerique * (1 - $this->getRemisePercent());

		// Valeur de remise
		$totalRemise = $htInitial - $prixRemise;
		$this->setTotalRemise($totalRemise);
		$this->setHt($prixRemise);
		$this->setTva($prixRemise * $this->getProduit()->getTvaFactor());
		$this->setTtc($this->getTva() + $this->getHt());
	}
	
	/**
	* @ORM\PostPersist
	*/
	public function updateVente(){
		$this->getVente()->reCalculate();
	}
}