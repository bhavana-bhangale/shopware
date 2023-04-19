<?php declare(strict_types=1);
namespace SwagBlogDemo\Core\Content\BlogDemo;
use Shopware\Core\Content\Category\CategoryDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateTimeField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyIdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use SwagBlogDemo\Core\Content\BlogCategory\BlogCategoryDefinition;
use SwagBlogDemo\Core\Content\BlogDemo\Aggregate\BlogDemoTranslation\BlogDemoTranslationDefinition;

class BlogDemoDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_demo';
    public function getEntityName(): string
    {
       return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return BlogDemoEntity::class;

    }
    public function getCollectionClass(): string
    {
        return BlogDemoCollection::class;

    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new Required(),new PrimaryKey()),
            new TranslatedField('name'),
            new TranslatedField('description'),
            (new DateTimeField('release_date','releaseDate'))->addFlags(new ApiAware(),new Inherited()),
            new BoolField('active','active'),
            new FkField('category_id','categoryId',CategoryDefinition::class),
            (new StringField('author','author')),

            //Category Association
            new ManyToOneAssociationField(
                'swagBlogCategory',
                'swag_blog_category_id',
                BlogCategoryDefinition::class,
                'id',
                false
            ),
            //product Association
            new ManyToManyAssociationField(
                'products',
                ProductDefinition::class,
                ProductCategoryMappingDefintion::class,
                'swag_blog_demo_id',
                'product_id'
            ),
            //Translation
            new TranslationsAssociationField(
                BlogDemoTranslationDefinition::class,
                'swag_blog_demo_id'
            )

        ]);

    }
}
