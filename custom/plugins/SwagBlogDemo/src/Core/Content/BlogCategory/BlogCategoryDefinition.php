<?php declare(strict_types=1);
namespace SwagBlogDemo\Core\Content\BlogCategory;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlogDemo\Core\Content\BlogDemo\BlogDemoDefinition;

class BlogCategoryDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_category';
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return BlogCategoryEntity::class;
    }
    public function getCollectionClass(): string
    {
        return BlogCategoryCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new Required()),
            new TranslatedField('name'),
            new OneToManyAssociationField(
                'swagBlogDemoId',
                BlogDemoDefinition::class,
                'category_id'
            )
        ]);

    }
}
