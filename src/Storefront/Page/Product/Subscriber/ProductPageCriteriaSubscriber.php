<?php declare(strict_types=1);

namespace Greg\FaqPlugin\Storefront\Page\Product\Subscriber;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;

class ProductPageCriteriaSubscriber implements EventSubscriberInterface {
    private $configService;

    // arguments passed to the __construct message have to be provided in
    // /Resources/config/services.xml in a <argument> tag

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
        //only adds faqs to the product page if showInStoreFront is checked defined in /Resources/config/config.xml
        if($this->configService->get('FaqPlugin.config.showInStoreFront')) {
            $event->getCriteria()->addAssociation('faqs');
        }
    }


}
