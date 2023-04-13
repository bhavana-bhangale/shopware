<?php
namespace SwagShopFinder\Core\Api;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\System\Country\CountryEntity;
use Shopware\Core\System\Country\Exception\CountryNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Shopware\Core\Framework\Context;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\Framework\Uuid\Uuid;
use Faker\Factory;

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

    public function __construct(EntityRepositoryInterface $countryRepository,EntityRepositoryInterface  $shopFinderRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->shopFinderRepository = $shopFinderRepository;
    }

    /**
     * @Route("/api/v{version}/_action/swag-shop-finder/generate",name="api.custom.swag_shop_finder.generate", methods={"POST"})
     * @return Response
     * @param Context $context
     * @throws CountryNotFoundException
     * @throws InconsistentCriteriaIdsException
     */
    public function generate(Context $context):Response
    {
        $faker= Factory::create();
        $country=$this->getActiveCountry($context);

        $data=[];
        for($i = 0; $i < 50; $i++ )
        {
            $data[]=[
              'id' => Uuid::randomHex(),
                'active'=>true,
                'name'=>$faker->name,
                'description'=>$faker->text,
                'city'=>$faker->city,
                'telephone'=>$faker->phoneNumber,
                'countryId'=>$country->getId(),
            ];
        }
        $this->shopFinderRepository->create($data,$context);
        return new Response('Success');
    }

    /**
     * @param Context $context
     * @return CountryEntity
     * @throws CountryNotFoundException
     * @throws InconsistentCriteriaIdsException
     */
    public function getActiveCountry(Context $context):CountryEntity
    {
        $criteria= new Criteria();
        $criteria->addFilter(new EqualsFilter('active','1'));//set query
        $criteria->setLimit(1);

        $country=$this->countryRepository->search($criteria,$context)->getEntities()->first();
        if($country === null)
        {
            throw new CountryNotFoundException('');
        }
        return $country;




    }

}
