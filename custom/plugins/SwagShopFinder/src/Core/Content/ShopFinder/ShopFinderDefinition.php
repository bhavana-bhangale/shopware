<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\CountryDefinition;
use SwagShopFinder\Core\Content\ShopFinder\Aggregate\ShopFinderTranslation\ShopFinderTranslationDefinition;

class ShopFinderDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_shop_finder'; //database table name

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;   //use variable const
    }

    public function getEntityClass(): string
    {
        return ShopFinderEntity::class; //
    }
    public function getCollectionClass(): string
    {
        return ShopFinderCollection::class; //
    }

    protected function defineFields(): FieldCollection    //define database field
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new BoolField('active', 'active'),
            new TranslatedField('name'),
            new TranslatedField('description'),
            (new StringField('city','city'))->addFlags(new Required()),
            new StringField('telephone','telephone'),
            new FkField('country_id','countryId',CountryDefinition::class),
            //Association
            new ManyToOneAssociationField(
                'country',
                'country_id',
                CountryDefinition::class,
                'id',
                false
            ),
            //Translation
            new TranslationsAssociationField(
                ShopFinderTranslationDefinition::class,
                'swag_shop_finder_id'
            )


        ]);
    }
}



