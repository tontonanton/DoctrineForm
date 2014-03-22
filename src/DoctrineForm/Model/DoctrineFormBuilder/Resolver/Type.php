<?php

namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

use DoctrineForm\Model\DoctrineFormBuilder\Resolver\ResolverAbstract;

/**
 * Description of Type
 * Return element's TYPE for Zend\Form\Element from doctrine's metadatas
 * @author tonton
 */
class Type extends ResolverAbstract {

    protected $mapping;

    public function __construct(){
      /**
         * Default mapping Rules
         * Maps doctrine field type to form element type
         * ElementParser will try to be more accurate thant those simple defaults
         * Used as simple array to ease overriding /merging with custom wish
         */
        $this->setMapping(
            array(
            'string'=>'text',
            'integer'=>'text',
            'smallint'=>'text',
            'bigint'=>'text',
            'boolean'=>'text',
            'decimal'=>'text',
            'date'=>'text',
            'time'=>'text',
            'datetime'=>'text',
            'datetimetz'=>'text',
            'text'=>'textarea',
            'float'=>'text',            
        ));        
    }
    
    public function setMapping($mapping){
        $this->mapping = $mapping;
        return $this;
    }
    
    /**
     * Resolve attributes/options... for a single field
     * @param array $map
     */
    public function resolveField($map){
        if (isset($map['type'])){
            if (isset($this->mapping[$map['type']])){
               return array('type'=>$this->mapping[$map['type']]);                
            }
        }
        
        return array('type'=>'text');
    }

    /**
     * Resolve attributes/options... for a field based on association
     * Returns Select type for all associations
     * @param array $map
     */
    public function resolveAssociation($map){
        return array('type'=>'select');                
    }
    
}
