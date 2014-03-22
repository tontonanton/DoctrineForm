<?php
namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

use DoctrineForm\Model\DoctrineFormBuilder\Resolver\ResolverAbstract;

/**
 * Description of Form
 * Resolve form name attributes options for Form Tag
 * Just resolve name and entity attributes for the form tag
 * Entity is defined to ease form workaroud
 * @author tonton
 */
class Form extends ResolverAbstract{

    public function resolve($metadatas){
        $attributes=array();
        if (isset($metadatas->name)){
            $FQCN = $metadatas->name;
            $FArray = explode("\\", $FQCN);
            $attributes['name'] = $FArray[count($FArray)-1];
            $attributes['entity'] = $metadatas->name;
        }
        return $attributes;
    }
}
