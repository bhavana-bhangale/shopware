<?php declare(strict_types=1);
namespace SwagShopFinder\Storefront\Subscriber;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FooterSubscriber implements EventSubscriberInterface
{
    private $systemConfigService;
    private $shopFinderService;

    public function __construct(SystemConfigService $systemConfigService,EntityRepositoryInterface $shopFinderService)
    {
        $this->systemConfigService=$systemConfigService;
        $this->shopFinderService=$shopFinderService;
    }

    public static function getSubscribedEvents()
    {
        // subscribe FooterPageletEvents
        return [
            FooterPageletLoadedEvent::class => 'onFooterPageletLoaded'
        ];
    }
    public function onFooterPageletLoaded(FooterPageletLoadedEvent $event): void
    {
            if(!$this->systemConfigService->get('SwagShopFinder.config.showInStoreFront'))
            {
                return;
            }
    }
}
