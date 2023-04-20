<?php declare(strict_types=1);

namespace SwagBlogDemo\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1681989089 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1681989089;
    }

    public function update(Connection $connection): void
    {
       $query= <<< SQL

        CREATE TABLE `swag_blog_category` (
            `id` BINARY(16) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_blog_category_translation` (
            `name` VARCHAR(255) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            `swag_blog_category_id` BINARY(16) NOT NULL,
            `language_id` BINARY(16) NOT NULL,
            PRIMARY KEY (`swag_blog_category_id`,`language_id`),
            KEY `fk.swag_blog_category_translation.swag_blog_category_id` (`swag_blog_category_id`),
            KEY `fk.swag_blog_category_translation.language_id` (`language_id`),
            CONSTRAINT `fk.swag_blog_category_translation.swag_blog_category_id` FOREIGN KEY (`swag_blog_category_id`) REFERENCES `swag_blog_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk.swag_blog_category_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_blog_demo` (
            `id` BINARY(16) NOT NULL,
            `release_date` DATETIME(3) NULL,
            `active` TINYINT(1) NULL DEFAULT '0',
            `swag_blog_category_id` BINARY(16) NULL,
            `author` VARCHAR(255) NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`),
            KEY `fk.swag_blog_demo.swag_blog_category_id` (`swag_blog_category_id`),
            CONSTRAINT `fk.swag_blog_demo.swag_blog_category_id` FOREIGN KEY (`swag_blog_category_id`) REFERENCES `swag_blog_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_blog_demo_translation` (
                `name` VARCHAR(255) NOT NULL,
                `description` LONGTEXT NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                `swag_blog_demo_id` BINARY(16) NOT NULL,
                `language_id` BINARY(16) NOT NULL,
                PRIMARY KEY (`swag_blog_demo_id`,`language_id`),
                KEY `fk.swag_blog_demo_translation.swag_blog_demo_id` (`swag_blog_demo_id`),
                KEY `fk.swag_blog_demo_translation.language_id` (`language_id`),
                CONSTRAINT `fk.swag_blog_demo_translation.swag_blog_demo_id` FOREIGN KEY (`swag_blog_demo_id`) REFERENCES `swag_blog_demo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.swag_blog_demo_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        CREATE TABLE `swag_blog_product_map` (
                `swag_blog_demo_id` BINARY(16) NOT NULL,
                `product_id` BINARY(16) NOT NULL,
                `product_version_id` BINARY(16) NULL,
                PRIMARY KEY (`swag_blog_demo_id`,`product_id`),
                KEY `fk.swag_blog_product_map.swag_blog_demo_id` (`swag_blog_demo_id`),
                KEY `fk.swag_blog_product_map.product_id` (`product_id`,`product_version_id`),
                CONSTRAINT `fk.swag_blog_product_map.swag_blog_demo_id` FOREIGN KEY (`swag_blog_demo_id`) REFERENCES `swag_blog_demo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.swag_blog_product_map.product_id` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


SQL;
       $connection->executeStatement($query);

    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
