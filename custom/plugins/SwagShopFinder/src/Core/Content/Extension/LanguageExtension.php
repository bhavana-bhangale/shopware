<?php declare(strict_types=1);
namespace SwagShopFinder\Core\Content\Extension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagShopFinder\Core\Content\ShopFinder\Aggregate\ShopFinderTranslation\ShopFinderTranslationDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
       $collection->add(
           new OneToManyAssociationField(
               'SwagShopFinderTransId',//translated table property name
               ShopFinderTranslationDefinition::class,
               'swag_shop_finder_id'// translated table id(main definition entity id)
           )
       );
    }
    public function getDefinitionClass(): string
    {
       return LanguageDefinition::class; // define in core\system\language\languageDefinition
    }
}
