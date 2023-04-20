<?php declare(strict_types=1);

namespace SwagDataDemo\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1681819264 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1681819264;
    }

    public function update(Connection $connection): void
    {
       $query= <<< SQL
                    CREATE TABLE `swag_data_demo` (
                        `id` BINARY(16) NOT NULL,
                        `active` TINYINT(1) NULL DEFAULT '0',
                        `country_id` BINARY(16) NULL,
                        `country_state_id` BINARY(16) NULL,
                        `media_id` BINARY(16) NULL,
                        `product_id` BINARY(16) NULL,
                        `product_version_id` BINARY(16) NULL,
                        `created_at` DATETIME(3) NOT NULL,
                        `updated_at` DATETIME(3) NULL,
                        PRIMARY KEY (`id`),
                        KEY `fk.swag_data_demo.country_id` (`country_id`),
                        KEY `fk.swag_data_demo.country_state_id` (`country_state_id`),
                        KEY `fk.swag_data_demo.product_id` (`product_id`,`product_version_id`),
                        CONSTRAINT `fk.swag_data_demo.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                        CONSTRAINT `fk.swag_data_demo.country_state_id` FOREIGN KEY (`country_state_id`) REFERENCES `country_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                        CONSTRAINT `fk.swag_data_demo.product_id` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`) ON DELETE CASCADE ON UPDATE CASCADE
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                    CREATE TABLE `swag_data_demo_translation` (
                        `name` VARCHAR(255) NOT NULL,
                        `city` VARCHAR(255) NOT NULL,
                        `created_at` DATETIME(3) NOT NULL,
                        `updated_at` DATETIME(3) NULL,
                        `swag_data_demo_id` BINARY(16) NOT NULL,
                        `language_id` BINARY(16) NOT NULL,
                        PRIMARY KEY (`swag_data_demo_id`,`language_id`),
                        KEY `fk.swag_data_demo_translation.swag_data_demo_id` (`swag_data_demo_id`),
                        KEY `fk.swag_data_demo_translation.language_id` (`language_id`),
                        CONSTRAINT `fk.swag_data_demo_translation.swag_data_demo_id` FOREIGN KEY (`swag_data_demo_id`) REFERENCES `swag_data_demo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                        CONSTRAINT `fk.swag_data_demo_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
                SQL;
       $connection->executeStatement($query);

    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
