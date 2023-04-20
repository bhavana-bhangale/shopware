<?php declare(strict_types=1);

namespace SwagBlogDemo\Core\Content\BlogDemo\Aggregate\BlogDemoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\AllowHtml;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlogDemo\Core\Content\BlogDemo\BlogDemoDefinition;

class BlogDemoTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME="swag_blog_demo_translation";
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    public function getEntityClass(): string
    {
        return BlogDemoTranslationEntity::class;
    }
    public function getCollectionClass(): string
    {
        return BlogDemoTranslationCollection::class;
    }
    public function getParentDefinitionClass(): string
    {
        return BlogDemoDefinition::class;

    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name','name'))->addFlags(new Required()),
            (new LongTextField('description','description'))->addFlags(new Required(),new AllowHtml())
        ]);


    }
}
