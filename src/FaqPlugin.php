<?php declare(strict_types=1);

namespace Greg\FaqPlugin;
// TODO try to add documentation
use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class FaqPlugin extends Plugin
{
    public function activate(ActivateContext $activateContext): void
    {
        //completely different in Training
        $entityIndexerRegistry = $this->container->get(EntityIndexerRegistry::class);
        $entityIndexerRegistry->sendIndexingMessage(['product.indexer']);
    }

    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);

        if ($context->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);
        $connection->executeStatement('DROP TABLE IF EXISTS `greg_faq_product`');
        $connection->executeStatement('DROP TABLE IF EXISTS `greg_faq`');
        $connection->executeStatement('ALTER TABLE `product` DROP COLUMN `faqs`');

    }
}
