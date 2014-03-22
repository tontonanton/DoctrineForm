DoctrineForm
============

Zend Framework 2 Forms From Doctrine's Entity

Zend Framework 2 Form generation from doctrine MetaDataClass

this module, actually in an early early version intends to provide form creation directly from an entity without any added @Annotation than doctrine needs to handle the entity.

It works currently, the form builder takes doctrine metadata in order to generate a form configuration.
This configuration is then handled by Zend\Form\Factory to get a final form class.

If @Annotations are in the entity, the form is going to be builded also from those annotations. Annotations found will overvrite form configuration previously generated on the entity's doctrine's properties.

At that time, it works, i mean forms are generated from simple entities without any extra annotation than doctrine's need.

The module provided is for development, that means you'll find a controller that i'm using to build the tool.

There is absolutly no documentation at that time, i just wrote the code today.

See you 
:-)
