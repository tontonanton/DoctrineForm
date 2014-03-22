<?php

namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

use DoctrineForm\Model\DoctrineFormBuilder\Resolver\ResolverAbstract;

/**
 * Description of Options
 *
 * Actually, just resolves Label option
 * @author tonton
 */
class Options extends ResolverAbstract {
   
    /**
     * Resolve attributes/options... for a single field
     * @param array $map
     */
    public function resolveField($map){
        return $this->resolveUniqueWay();
    }

    /**
     * Resolve attributes/options... for a field based on association
     * @param array $map
     */
    public function resolveAssociation($map){
        return $this->resolveUniqueWay();
    }
    
    private function resolveUniqueWay(){
        $options = array();
        $options['label']= $this->fieldName;
        
        return array('options'=>$options);
    }
}
