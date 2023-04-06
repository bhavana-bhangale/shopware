<?php declare(strict_types=1);

namespace SwagShopFinder\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1680776522 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1680776522;
    }

    /**
     * @throws Exception
     */
    public function update(Connection $connection): void
    {
        // implement update
        $query= <<<SQL
                    CREATE TABLE `swag_shop_finder` (
                        `id` BINARY(16) NOT NULL,
                        `active` TINYINT(1) NULL DEFAULT '0',
                        `name` VARCHAR(255) NOT NULL,
                        `description` VARCHAR(255) NOT NULL,
                        `city` VARCHAR(255) NOT NULL,
                        `telephone` VARCHAR(255) NULL,
                        `created_at` DATETIME(3) NOT NULL,
                        `updated_at` DATETIME(3) NULL,
                        PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
                 SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
