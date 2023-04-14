<?php declare(strict_types=1);

namespace SwagDataDemo\Core\Content\DataDemo\Aggregate\DataDemoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                add(DataDemoTranslationEntity $entity)
 * @method void                set(string $key, DataDemoTranslationEntity $entity)
 * @method DataDemoTranslationEntity[]    getIterator()
 * @method DataDemoTranslationEntity[]    getElements()
 * @method DataDemoTranslationEntity|null get(string $key)
 * @method DataDemoTranslationEntity|null first()
 * @method DataDemoTranslationEntity|null last()
 */
 #[Package('core')]
class DataDemoTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return DataDemoTranslationEntity::class;
    }
}
