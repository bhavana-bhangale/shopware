<?php declare(strict_types=1);

namespace SwagDataDemo\Core\Content\DataDemo;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                add(DataDemoEntity $entity)
 * @method void                set(string $key, DataDemoEntity $entity)
 * @method DataDemoEntity[]    getIterator()
 * @method DataDemoEntity[]    getElements()
 * @method DataDemoEntity|null get(string $key)
 * @method DataDemoEntity|null first()
 * @method DataDemoEntity|null last()
 */
 #[Package('core')]
class DataDemoCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return DataDemoEntity::class;
    }
}
