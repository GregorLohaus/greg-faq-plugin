<?php declare(strict_types=1);

namespace Greg\FaqPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1619057875 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1619057875;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS `greg_faq` (
                `id` BINARY(16) NOT NULL,
                `question` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
                `answer` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
                PRIMARY KEY (`id`)
            )
                ENGINE = InnoDB
                DEFAULT CHARSET = utf8mb4
                COLLATE = utf8mb4_unicode_ci;
            SQL;
        $connection->executeStatement($sql);

    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
