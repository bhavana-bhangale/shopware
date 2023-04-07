<?php declare(strict_types=1);

namespace SwagShopFinder\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1680850900 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1680850900;
    }

    public function update(Connection $connection): void
    {
        $query= <<<SQL
                 CREATE TABLE `swag_shop_finder` (
                    `id` BINARY(16) NOT NULL,
                    `active` TINYINT(1) NULL DEFAULT '0',
                    `name` VARCHAR(255) NOT NULL,
                    `description` VARCHAR(255) NOT NULL,
                    `city` VARCHAR(255) NOT NULL,
                    `telephone` VARCHAR(255) NULL,
                    `country_id` BINARY(16) NULL,
                    `created_at` DATETIME(3) NOT NULL,
                    `updated_at` DATETIME(3) NULL,
                    PRIMARY KEY (`id`),
                    KEY `fk.swag_shop_finder.country_id` (`country_id`),
                    CONSTRAINT `fk.swag_shop_finder.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
                SQL;
        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
