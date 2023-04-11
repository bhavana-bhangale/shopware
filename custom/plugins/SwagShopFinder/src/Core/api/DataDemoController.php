<?php

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @RouteScope(scopes={"api"})
 */
class DataDemoController extends AbstractController
{
    /**
     * @var EntityRepositoryInterface
     */
    private $countryRepository;
    /**
     * @var EntityRepositoryInterface
     */
    private $shopFinderRepository;

}
