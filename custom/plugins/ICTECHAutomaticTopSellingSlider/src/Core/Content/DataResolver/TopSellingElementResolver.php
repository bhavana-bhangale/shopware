<?php declare(strict_types=1);
namespace ICTECHAutomaticTopSellingSlider\Core\Content\DataResolver;
use Shopware\Core\Checkout\Order\Aggregate\OrderLineItem\OrderLineItemDefinition;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\EntityResolverContext;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\System\SystemConfig\SystemConfigService;

class TopSellingElementResolver extends AbstractCmsElementResolver
{
    private EntityRepository  $orderLineItemRepository;
    private SystemConfigService $systemConfigService;

    /**
     * @return EntityRepositoryInterface
     */
    public function __construct(
        EntityRepository $orderLineItemRepository,
        SystemConfigService $systemConfigService
    )
    {
        $this->orderLineItemRepository = $orderLineItemRepository;
        $this->systemConfigService = $systemConfigService;
    }


    public function getType(): string
    {
        return 'top-selling-product-slider';
    }

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {
        $collection = new CriteriaCollection();
        $criteria= new Criteria();
        $criteria->addAssociation('product');
        $criteria->addAssociation('product.categories');
//        $criteria->addFilter(new EqualsFilter('id','01108535f4ec449c978d1615ad7638ea'));
//        $collection->add(
//            'top-selling-product-slider-data',
//            OrderLineItemDefinition::class,
//            $criteria
//        );
//        dd($collection);

//        $criteria->addFilter(new EqualsFilter('product.categories.id',$categoryId));
        return $collection->all() ? $collection : null;
    }

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {
        $slot->setData($result->get('top-selling-product-slider-data'));
        dd($slot);

        if ($productConfig->isMapped() && $resolverContext instanceof EntityResolverContext) {
            $product = $this->resolveEntityValue($resolverContext->getEntity(), $productConfig->getStringValue());
        }
        return ;








    }
}
