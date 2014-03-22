<?php 
namespace DoctrineForm\Entity;

use DoctrineForm\Entity\Produit;
use DoctrineForm\Entity\Client;
use DoctrineForm\Entity\VenteProduit;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Zend\Form\Annotation;

/**
* @ORM\Entity
* @ORM\Table(name = "ventes");
* @ORM\HasLifeCycleCallbacks
*/
class Vente{
	/** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="string") */
	protected $id;
	
	/**
	* @ORM\Column (name="dat", type="datetime", nullable=false)
	*/
	protected $dat;
	
	/**
	* @ORM\ManyToOne(targetEntity = "client", inversedBy="ventes")
	*/
	protected $client;

	/**
	* On ne fait pas de lien aux produit, mais aux venteProduit
	* Vente Produit, a son tour va faire un lien vers le produit stocké
	* Depuis la vente, nous n'accèderons donc directement qu'au produit VENDU et non pas au produit STOCKE
	* Le produit stocké s'appelle par getProduit depuis le produit vendu
	* @ORM\OneToMany(targetEntity="VenteProduit", mappedBy="vente")
	*/
	protected $produits;
	
	/**
	* @ORM\Column(name="ht",type="float",precision=10, scale=0, nullable=false)
	*/
	protected $totalHt;

	/**
	* @ORM\Column(name="tva",type="float",precision=10, scale=0, nullable=false)
	*/	
	protected $totalTva;

	/**
	* @ORM\Column(name="ttc",type="float",precision=10, scale=0, nullable=false)
	*/	
	protected $totalTtc;	
	
	public function __construct(){
		$this->produits = new ArrayCollection();
	}

	public function setDat(DateTime $date){
		$this->dat = $date;
		return $this;
	}
	
	public function getDat(){
		return $this->dat;
	}
	
	public function setClient(Client $client){
		$this->client = $client;
		return $this;
	}

	public function getClient(){
		return $this->client;
	}
	
	public function getTotalHt(){
		return $this->totalHt;
	}

	public function getTotalTva(){
		return $this->totalTva;		
	}

	public function getTotalTtc(){
		return $this->totalTtc;
	}	

	public function setTotalHt($ht){
		$this->totalHt=$ht;
		return $this;
	}

	public function setTotalTva($tva){
		$this->totalTva = $tva;
		return $this;
	}

	public function setTotalTtc($ttc){
		$this->totalTtc = $ttc;
		return $this;		
	}

	public function getProduits(){
		return $this->produits;
	}

	/**
	* Calcule les parties financières depuis les produits
	* Après mise à jour/ajout de produit, cette fonctionn est appelée depuis l'entité du produit
	*/
	public function reCalculate(){
		$ht=0;
		$tva=0;
		$ttc =0;
	
		foreach($this->getProduits() as $produit){
			$ht += $produit->getHt();
			$tva += $produit->getTva();
			$ttc += $produit->getTtc();
		}
		
		$this->setTotalHt($ht);
		$this->setTotalTva($tva);
		$this->setTotalTtc($ttc);		
	}
}
