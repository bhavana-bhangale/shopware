<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ExampleDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_example'; //database table name

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;   //give entity class name
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([]);   //define database field
    }
}



