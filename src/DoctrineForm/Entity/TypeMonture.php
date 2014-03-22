<?php

namespace DoctrineForm\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * TypeMonture (nylor,cerclée, percée...)
 *
 * @ORM\Table(name="types_montures")
 * @ORM\Entity
 * @Annotation\Name("Type de Monture")
 */
class TypeMonture
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
     * @ORM\Column(name="Nom", type="string", length=32, nullable=false)
     * @Annotation\Attributes({"type":"text", "required":"true"})
     * @Annotation\Options({"label":"Type de monture"})
     */
    private $nom;

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
     * @return Categorie
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
    
    public function __toString() {
        return $this->getNom();
    }
}
