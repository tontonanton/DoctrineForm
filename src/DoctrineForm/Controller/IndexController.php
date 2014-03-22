<?php

namespace DoctrineForm\Controller;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Mco\Model\EntityExtractor;
use Zend\Form\Factory as Factory;
use Zend\Form\Annotation\AnnotationBuilder;

class IndexController extends AbstractActionController{

	/**
	* Only contains view Variable lig a vars container, that's all
	*/
	protected $view;

	public function __construct(){
            $this->view = new \stdClass();
	}

	public function indexAction(){
	
		/**
		*
		*/
	}

    /**
    * Show entities basic reflection
    */
    public function entitiesAction(){
        $extractor=new EntityExtractor;
        $entities=array();
        $files=glob(__DIR__ . "/../Entity/*.php");

        $basePath = 'DoctrineForm\Entity\\';

        foreach($files as $file){
            $fa=explode("/",$file);
            $className = str_replace(".php","",$fa[count($fa)-1]);
            if(trim($className)=='' or strlen($className)<3)
                continue;

            $classFQ = $basePath . $className;
            $entity = new $classFQ;
            $entities[$className] = $extractor->extract($entity);
        }

        $vm=new ViewModel(array('entities'=>$entities));
        $vm->setTemplate('index/entities.phtml');
        return $vm;
    }

    /**
    * For one entity, displays Doctrine's metadatas and form annotation construciton until specs are complete
    * Used to map properties and define the logc to apply to build a form directly from doctrine's metadatas
    */
    public function metadataAction(){
        $basePath = 'DoctrineForm\Entity\\';
        $entityName= $this->params()->fromRoute('entity');
        $className = $basePath  . $entityName;
        $entity = new $className;

        $builder=new AnnotationBuilder();
        $specs = $builder->getFormSpecification($entity);

        $cmf = $this->getEntityManager()->getMetadataFactory();
        $class = $cmf->getMetadataFor($className);

        $this->view->doctrine=$class;
        $this->view->form = $specs;

        $vm = new ViewModel(get_object_vars($this->view));
        $vm->setTemplate('index/metadata.phtml');
        return $vm;		
    }

        public function formAction(){
            $basePath = '\DoctrineForm\Entity\\';
            $entityName= $this->params()->fromRoute('entity');            
            $className = $basePath  . $entityName;
            
            $builder=new \DoctrineForm\Model\DoctrineFormBuilder();
            $builder->setEntityManager($this->getEntityManager());
            $builder->setEntityClassName($className);
            $form = $builder->getForm();
            
            $vm=new ViewModel(array('form'=>$form));
            $vm->setTemplate('index/form.phtml');
            return $vm;
        }
        
    protected function getEntityManager(){
	    return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
}