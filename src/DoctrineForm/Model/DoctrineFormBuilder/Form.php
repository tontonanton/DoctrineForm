<?php 

namespace DoctrineForm\Model\DoctrineFormBuilder;


class Form{

	public function getName($metadatas){
		if (!isset($metadatas['name'])){
			throw new \Exception("Could not retrieve name as name is not defined in metadatas. Check given metadatas, doctrine's one (expected) always gives");
		}

		$n = explode("\\" , $metadatas['name']);
		return $n[count($n)-1];
	}

	public function getEntity(){
		return $metadatas['rootEntityName']
	}

	public funciton getProperty($propertyName){
		if (isset($metadatas[$propertyName]))
			return $metadatas[$propertyName];

		return null;
	}
}
