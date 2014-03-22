<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

use DoctrineForm\Model\DoctrineFormBuilder\Resolver\ResolverInterface;

/**
 * Description of Abstract
 *
 * @author tonton
 */
class ResolverAbstract implements ResolverInterface{

    protected $fieldName;
    
    /**
     * Simply loop over metadatas and define it's own scope of properties/attributes/options...
     * @param array $metadatas
     * @return Array
     */
    public function resolve($metadatas){
        
        foreach($metadatas->fieldMappings as $fieldName => $fieldMap){
            $this->fieldName = $fieldName;            
            $basicMap[$fieldName] = array('spec'=>$this->resolveField($fieldMap), 'flags'=>array());
        }
        
        foreach($metadatas->associationMappings as $fieldName =>$associationMap){
            $this->fieldName = $fieldName;
            if (!isset($associationMap['joinColumns'])){
                // Do nothing
            }else{
                if(count($associationMap['joinColumns'])>0){
                    $association[$fieldName] = array('spec'=>$this->resolveAssociation($associationMap['joinColumns'][0]), 'flags'=>array());
                }                
            }
        }
        return array_merge_recursive($basicMap, $association); 
    }

    /**
     * Resolve attributes/options... for a single field
     * @param array $map
     */
    public function resolveField($map){
    }

    /**
     * Resolve attributes/options... for a field based on association
     * @param array $map
     */
    public function resolveAssociation($map){
    }
}
