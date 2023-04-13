<?php declare(strict_types=1);
namespace SwagDataDemo\Core\Content\DataDemo\Aggregate\DataDemoTranslation;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagDataDemo\Core\Content\DataDemo\DataDemoDefinition;

class DataDemoTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME="swag_data_demo_translation";
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return DataDemoTranslationEntity::class;

    }
    public function getCollectionClass(): string
    {
        return DataDemoTranslationCollection::class;
    }
    public function getParentDefinitionClass(): string
    {
        return DataDemoDefinition::class;

    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name','name'))->addFlags(new Required()),
            (new StringField('city','city'))->addFlags(new Required())
        ]);

    }
}
