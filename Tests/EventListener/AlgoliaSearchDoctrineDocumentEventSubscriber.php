<?php
namespace Algolia\AlgoliaSearchSymfonyDoctrineBundle\Tests\EventListener;

use Algolia\AlgoliaSearchSymfonyDoctrineBundle\EventListener\AlgoliaSearchDoctrineDocumentEventSubscriber as RealEventSubscriber;

class AlgoliaSearchDoctrineDocumentEventSubscriber extends RealEventSubscriber
{
    public function create($entity)
    {
        if ($entity instanceof \Algolia\AlgoliaSearchSymfonyDoctrineBundle\Tests\Entity\BaseTestAwareEntity) {
            $entity->setTestProp('create_callback', 'called');
        }

        parent::create($entity);
    }

    public function update($entity, $changeSet)
    {
        if ($entity instanceof \Algolia\AlgoliaSearchSymfonyDoctrineBundle\Tests\Entity\BaseTestAwareEntity) {
            $entity->setTestProp('update_callback', 'called');
        }

        parent::update($entity, $changeSet);
    }

    public function delete($entity, $originalData)
    {
        if ($entity instanceof \Algolia\AlgoliaSearchSymfonyDoctrineBundle\Tests\Entity\BaseTestAwareEntity) {
            $entity->setTestProp('delete_callback', 'called');
        }

        parent::delete($entity, $originalData);
    }
}