<?php declare(strict_types=1);
namespace SwagBlogDemo\Core\Content\Mapping;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;
use SwagBlogDemo\Core\Content\BlogDemo\BlogDemoDefinition;

class ProductCategoryMappingDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_product_map';
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('swag_blog_demo_id','swagBlogDemoId',BlogDemoDefinition::class))->addFlags(new PrimaryKey(),new Required()),
            (new FkField('product_id','products',ProductDefinition::class))->addFlags(new PrimaryKey(),new Required()),
            new ManyToOneAssociationField(),
            new ManyToOneAssociationField()

        ]);



    }
}
