<?php

namespace DoctrineForm\Model\DoctrineFormBuilder\Resolver;

/**
 * Description of Interface
 *
 * @author tonton
 */
Interface ResolverInterface{
    public function resolve($metadatas);
    /**
     * Resolve attributes/options... for a single field
     * @param array $map
     */
    public function resolveField($map);

    /**
     * Resolve attributes/options... for a field based on association
     * @param array $map
     */
    public function resolveAssociation($map);
}
