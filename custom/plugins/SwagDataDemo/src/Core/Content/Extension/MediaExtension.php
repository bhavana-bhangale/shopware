<?php declare(strict_types=1);
namespace SwagDataDemo\Core\Content\Extension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagDataDemo\Core\Content\DataDemo\DataDemoDefinition;
use Shopware\Core\Content\Media\MediaDefinition;

class MediaExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
      $collection->add(
          new OneToOneAssociationField(
              'media',
              'id',
              'media_id',
              DataDemoDefinition::class,
              false
          )
      );
    }

    public function getDefinitionClass(): string
    {
        return MediaDefinition::class;

    }
}
