<?php

namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

use DoctrineForm\Model\DoctrineFormBuilder\Resolver\ResolverAbstract;

/**
 * Description of Name
 *
 * @author tonton
 */
class Name extends ResolverAbstract{
    
    /**
     * Resolve attributes/options... for a single field
     * @param array $map
     */
    public function resolveField($map){
        return array('name'=>$this->fieldName);
    }

    /**
     * Resolve attributes/options... for a field based on association
     * @param array $map
     */
    public function resolveAssociation($map){
        return array('name'=>$this->fieldName);
    }
}
