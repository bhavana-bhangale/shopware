<?php declare(strict_types=1);
namespace SwagDataDemo\Core\Content\DataDemo;
use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\Aggregate\CountryState\CountryStateDefinition;
use Shopware\Core\System\Country\CountryDefinition;
use SwagDataDemo\Core\Content\DataDemo\Aggregate\DataDemoTranslation\DataDemoTranslationDefinition;

class DataDemoDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_data_demo';
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return DataDemoEntity::class;
    }
    public function getCollectionClass(): string
    {
        return DataDemoCollection::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new Required(),new PrimaryKey()),
            new BoolField('active','active'),
            new TranslatedField('name'),
            new TranslatedField('city'),

            new FkField('country_id','countryId',CountryDefinition::class),
            new FkField('country_state_id', 'countryStateId',CountryStateDefinition::class),
            new FkField('media_id','mediaId',MediaDefinition::class),
            (new FkField('product_id','productId',ProductDefinition::class)),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new ApiAware(),new Inherited()),


            //Country Association
            new ManyToOneAssociationField(
                'country',
                'country_id',
                CountryDefinition::class,
                'id',
                false
            ),
            //State Association
            new ManyToOneAssociationField(
                'countryState',
                'country_state_id',
                CountryStateDefinition::class,
                'id',
                false
            ),

            //Image Association
            new OneToOneAssociationField(
                'media',
                'media_id',
                'id',
                MediaDefinition::class,
                false
            ),
            //Product Association
            new ManyToOneAssociationField(
                'product',
                'product_id',
                ProductDefinition::class,
                'id',
                false
            ),
            //Translation
            new TranslationsAssociationField(
                DataDemoTranslationDefinition::class,
                'swag_data_demo_id'
            )
        ]);
    }
}

