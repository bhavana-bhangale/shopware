<?php declare(strict_types=1);

namespace SwagBlogDemo\Core\Content\BlogDemo;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @method void                add(BlogDemoEntity $entity)
 * @method void                set(string $key, BlogDemoEntity $entity)
 * @method BlogDemoEntity[]    getIterator()
 * @method BlogDemoEntity[]    getElements()
 * @method BlogDemoEntity|null get(string $key)
 * @method BlogDemoEntity|null first()
 * @method BlogDemoEntity|null last()
 */
 #[Package('core')]
class BlogDemoCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return BlogDemoEntity::class;
    }
}
