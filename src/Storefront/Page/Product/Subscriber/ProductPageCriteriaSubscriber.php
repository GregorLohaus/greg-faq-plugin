<?php declare(strict_types=1);

namespace Greg\FaqPlugin\Storefront\Page\Product\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;

class ProductPageCriteriaSubscriber implements EventSubscriberInterface {

    public static function getSubscribedEvents()
    {
        return [
            ProductPageCriteriaEvent::class => 'onProductCriteriaLoaded'
        ];
    }

    public function onProductCriteriaLoaded(ProductPageCriteriaEvent $event)
    {
        $event->getCriteria()->addAssociation('faqs');
    }


}
