<?php declare(strict_types=1);
namespace SwagShopFinder\Core\Content\ShopFinder\Aggregate\ShopFinderTranslation;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagShopFinder\Core\Content\ShopFinder\ShopFinderDefinition;

class ShopFinderTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME="swag_shop_finder_translation";//translation table name
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return ShopFinderTranslationEntity::class; // return entity class for translation
    }
    public function getCollectionClass(): string
    {
        return ShopFinderTranslationCollection::class;// return collection class for translation
    }
    public function getParentDefinitionClass(): string
    {
        return ShopFinderDefinition::class; //  returns the definition class of our entity we want to translate
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name','name'))->addFlags(new Required()),
            (new LongTextField('description','description'))->addFlags(new Required()),

        ]);
    }
}

