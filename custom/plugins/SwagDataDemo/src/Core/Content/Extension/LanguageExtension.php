<?php declare(strict_types=1);
namespace SwagDataDemo\Core\Content\Extension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagDataDemo\Core\Content\DataDemo\Aggregate\DataDemoTranslation\DataDemoTranslationDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'SwagDataDemoTransId', //translated table Property name
                DataDemoTranslationDefinition::class,
                'swag_data_demo_id'//translated table id(main definition id)
            )
        );
    }
    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}
