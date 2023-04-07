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
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\CountryDefinition;

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
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('description', 'description'))->addFlags(new Required()),
            (new StringField('city','city'))->addFlags(new Required()),
            new StringField('telephone','telephone'),
            new FkField('country_id','countryId',CountryDefinition::class),
            new ManyToOneAssociationField(
                'country',
                'country_id',
                CountryDefinition::class,
                'id',
                false
            )


        ]);
    }
}



