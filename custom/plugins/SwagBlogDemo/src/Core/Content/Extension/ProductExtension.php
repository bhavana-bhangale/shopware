<?php declare(strict_types=1);
namespace SwagBlogDemo\Core\Content\Extension;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlogDemo\Core\Content\BlogDemo\BlogDemoDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new ManyToManyAssociationField(
                'swagBlogDemoId',
                BlogDemoDefinition::class,
                ProductCategoryMappingDefintion::class,
                'product_id',
                'swag_blog_demo_id'
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
