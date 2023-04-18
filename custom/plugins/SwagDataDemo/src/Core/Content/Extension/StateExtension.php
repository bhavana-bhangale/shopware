<?php declare(strict_types=1);
namespace SwagDataDemo\Core\Content\Extension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\Aggregate\CountryState\CountryStateDefinition;
use SwagDataDemo\Core\Content\DataDemo\DataDemoDefinition;

class StateExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'countryStateId',
                DataDemoDefinition::class,
                'id'
            )
        );

    }

    public function getDefinitionClass(): string
    {
        return CountryStateDefinition::class;

    }
}
