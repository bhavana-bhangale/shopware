<?php declare(strict_types=1);
namespace  ICTECHAutomaticTopSellingSlider\Core\Content\DataResolver;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;

class TopSellingElementResolver extends AbstractCmsElementResolver
{

    public function getType(): string
    {
        // TODO: Implement getType() method.
    }

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {
        // TODO: Implement collect() method.
    }

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {
        // TODO: Implement enrich() method.
    }
}
