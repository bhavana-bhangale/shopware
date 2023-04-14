<?php declare(strict_types=1);
namespace SwagDataDemo\Core\Content\Extension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\CountryDefinition;
use SwagDataDemo\Core\Content\DataDemo\DataDemoDefinition;

class CountryExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
       $collection->add(
           new OneToManyAssociationField('country',
               DataDemoDefinition::class,
           'country_id')
       );
    }

    public function getDefinitionClass(): string
    {
        return CountryDefinition::class;
    }
}
