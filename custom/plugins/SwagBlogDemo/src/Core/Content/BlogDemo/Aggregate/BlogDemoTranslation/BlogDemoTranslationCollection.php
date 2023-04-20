<?php declare(strict_types=1);

namespace SwagBlogDemo\Core\Content\BlogDemo\Aggregate\BlogDemoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @method void                add(BlogDemoTranslationEntity $entity)
 * @method void                set(string $key, BlogDemoTranslationEntity $entity)
 * @method BlogDemoTranslationEntity[]    getIterator()
 * @method BlogDemoTranslationEntity[]    getElements()
 * @method BlogDemoTranslationEntity|null get(string $key)
 * @method BlogDemoTranslationEntity|null first()
 * @method BlogDemoTranslationEntity|null last()
 */
 #[Package('core')]
class BlogDemoTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return BlogDemoTranslationEntity::class;
    }
}
