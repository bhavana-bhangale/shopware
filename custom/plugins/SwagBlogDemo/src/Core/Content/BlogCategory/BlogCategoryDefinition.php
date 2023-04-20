<?php declare(strict_types=1);
namespace SwagBlogDemo\Core\Content\BlogCategory;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlogDemo\Core\Content\BlogCategory\Aggregate\BlogCategoryTranslation\BlogCategoryTranslationDefinition;
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
            (new IdField('id','id'))->addFlags(new Required(),new PrimaryKey()),
            new TranslatedField('name'),
            //Categories Reverse
            new OneToManyAssociationField(
                'swagBlogDemoIds',
                BlogDemoDefinition::class,
                'swag_blog_category_id'
            ),
            //Translation
            new TranslationsAssociationField(
                BlogCategoryTranslationDefinition::class,
                'swag_blog_category_id'
            )
        ]);

    }
}
