<?php
namespace DoctrineForm\Model\DoctrineFormBuilder;

use Zend\Config;

/**
 * Description of ArrayObjectBuilder
 * Receive an array
 * Return a Zend\Config\Config because Zend\Form\Factory like it
 * @author tonton
 */
class ArrayObjectBuilder {

    public function build($arrayConfig){
        // name and attributes remain outside elements'
        // they are form tag level
        $config=new Config\Config($arrayConfig,true);
        return $config;
    }
    
}
