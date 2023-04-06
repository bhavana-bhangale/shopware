<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @method void                add(ShopFinderEntity $entity)
 * @method void                set(string $key, ShopFinderEntity $entity)
 * @method ShopFinderEntity[]    getIterator()
 * @method ShopFinderEntity[]    getElements()
 * @method ShopFinderEntity|null get(string $key)
 * @method ShopFinderEntity|null first()
 * @method ShopFinderEntity|null last()
 */
#[Package('core')]
class ShopFinderCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ShopFinderEntity::class;
    }
}
