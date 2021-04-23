<?php declare(strict_types=1);

namespace Greg\FaqPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\InheritanceUpdaterTrait;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1619115153 extends MigrationStep
{
    use InheritanceUpdaterTrait;

    public function getCreationTimestamp(): int
    {
        return 1619115153;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS `greg_faq` (
                `id` BINARY(16) NOT NULL,
                `question` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
                `answer` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3),
                PRIMARY KEY (`id`)
            );
            CREATE TABLE IF NOT EXISTS `greg_faq_product` (
                `faq_id` BINARY(16) NOT NULL,
                `product_id` BINARY(16) NOT NULL,
                `product_version_id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3),
                PRIMARY KEY (`faq_id`, `product_id`, `product_version_id`),
                KEY `fk.greg_faq_product.faq_id_key` (`faq_id`),
                KEY `fk.greg_faq_product.product_id_key` (`product_id`),
                CONSTRAINT `fk.greg_faq_product.faq_id_const` FOREIGN KEY  (`faq_id`) REFERENCES `greg_faq` (`id`),
                CONSTRAINT  `fk.greg_faq_product.product_id_const` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`)
            )
                ENGINE = InnoDB
                DEFAULT CHARSET = utf8mb4
                COLLATE = utf8mb4_unicode_ci;
            SQL;
        $connection->executeStatement($sql);
        $this->updateInheritance($connection,'product','faqs');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
