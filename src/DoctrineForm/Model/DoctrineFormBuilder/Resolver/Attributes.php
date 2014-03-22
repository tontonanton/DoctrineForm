<?php

namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

use DoctrineForm\Model\DoctrineFormBuilder\Resolver\ResolverAbstract;

/**
 * Description of Attributes
 *
 * @author tonton
 */
class Attributes extends ResolverAbstract {
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
            'integer'=>'integer',
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
        $this->mapping=$mapping;
    }    
    
    public function resolveField($map){
        $attributes = array();
        
        if (isset($map['nullable'])){
            $attributes['required'] = ($map['nullable']) ? 'false' : 'true';
        }
        
        if (isset($map['type'])){
            if (isset($this->mapping[$map['type']])){
            $attributes['type'] = $this->mapping[$map['type']];
            }
        }        
        
        return array('attributes'=>$attributes);
    }
    
    public function resolveAssociation($map){
        $attributes = array();
        
        /**
         * Datas source will be attached to the element to ease form workaround
         */
        if (isset($map['targetEntity'])){
            $attributes['datas_source']=$map['targetEntity'];
        }

        /**
         * Required Attribute depends on nullable option
         */
        if (isset($map['nullable'])){
            $attributes['required'] = ($map['nullable']) ? 'false' : 'true';
        }
       
        $attributes['type']='select';
        
        return array('attributes'=>$attributes);
    }
    
}
