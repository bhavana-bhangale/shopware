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
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\HttpFoundation\Request;

class TopSellingElementResolver extends AbstractCmsElementResolver
{
    private EntityRepository  $orderLineItemRepository;
    private SystemConfigService $systemConfigService;


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
        $collection->add(
            'top-selling-product-slider-data',
            OrderLineItemDefinition::class,
            $criteria
        );

//        $criteria->addFilter(new EqualsFilter('product.categories.id',$categoryId));
        return $collection->all() ? $collection : null;
    }

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {
        $slot->setData($result->get('top-selling-product-slider-data'));
        $context = $resolverContext->getSalesChannelContext()->getContext();
        $config = $slot->getFieldConfig();



//        dd($config);

        $criteria= new Criteria();
//        $criteria->addAssociation('orderLineItems.quantity');
        $criteria->addAssociation('product');
        $criteria->addAssociation('product.manufacturer');
        $criteria->addAssociation('product.options.group');
        $criteria->addAssociation('product.options.group.translations');
        $criteria->addAssociation('product.cover');
        $criteria->addAssociation('product.media');
        $criteria->addAssociation('product.categories');
//        $criteria->addFilter(new EqualsFilter("product.id","2967e7db2a4e43ed87fcde9ac4725828"));
//        $criteria->addFilter(new EqualsFilter('id','01108535f4ec449c978d1615ad7638ea'));
//        $products = $this->orderLineItemRepository->search($criteria,$resolverContext->getSalesChannelContext()->getContext());
//        foreach ($products->getElements() as $_product){
//            dd($_product->product);
//        }
        $criteria->addSorting(new FieldSorting('quantity', FieldSorting::DESCENDING));
        $productCollection=$this->orderLineItemRepository->search($criteria,$context)->getElements();

        $products = [];

        foreach ($productCollection as $key => $value) {
            $productId = $value->productId;
            if($value->product !== null ){
//                $productId = $value->product->id;
//                dump($value->product);
//                $productId= $value->product->id;
                $parentId=$value->product->parentId;
                $productId = ($parentId !== null)? $value->product->parentId : $value->product->id;
                array_key_exists($productId, $products) ?
                    $products[$productId]->quantity = $products[$productId]->quantity + $value->quantity  :
                    $products[$productId] = $value ;
            }
            $variantNames[$value->id] = $value->label;
        }

        usort($products, function ($a, $b) {
            if($a->quantity == $b->quantity)
                return 0;
            return $a->quantity < $b->quantity ? 1 : -1;
        });

        dd($products);
        return ;


    }

    public function variantProductName($parentId,$context){
//        $variantCriteria = new Criteria();
////        $variantCriteria->addAssociation('translations');
////        $variantCriteria->addFilter(new EqualsFilter('id',$parentId));
////        $variantItem = $this->orderLineItemRepository->search($variantCriteria,$context)->getElements();
//        return $variantItem;
    }
}
