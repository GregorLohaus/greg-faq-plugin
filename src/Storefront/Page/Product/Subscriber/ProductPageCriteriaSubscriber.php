<?php declare(strict_types=1);

namespace Greg\FaqPlugin\Storefront\Page\Product\Subscriber;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;

class ProductPageCriteriaSubscriber implements EventSubscriberInterface {
    private $configService;
    public function __construct(SystemConfigService $configService)
    {
        $this->configService = $configService;
    }
    public static function getSubscribedEvents()
    {
        return [
            ProductPageCriteriaEvent::class => 'onProductCriteriaLoaded'
        ];
    }

    public function onProductCriteriaLoaded(ProductPageCriteriaEvent $event)
    {
        if($this->configService->get('FaqPlugin.config.showInStoreFront')) {
            $event->getCriteria()->addAssociation('faqs');
        }
    }


}
