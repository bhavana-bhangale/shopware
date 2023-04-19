<?php declare(strict_types=1);
namespace SwagBlogDemo\Core\Content\Extension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagBlogDemo\Core\Content\BlogCategory\BlogCategoryDefinition;
use SwagBlogDemo\Core\Content\BlogDemo\Aggregate\BlogDemoTranslation\BlogDemoTranslationDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'swag_blog_demo_trans_id',//translated table property name
                BlogDemoTranslationDefinition::class,
                'swag_blog_demo_id' //main definition id
            )
        );
        $collection->add(
            new OneToManyAssociationField(
                'swagBlogDemoTransId',
                BlogCategoryDefinition::class,
                'swag_blog_category_id'
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}
