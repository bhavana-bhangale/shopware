<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder\Aggregate\ShopFinderTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagShopFinder\Core\Content\ShopFinder\ShopFinderEntity;
use Shopware\Core\System\Language\LanguageEntity;

class ShopFinderTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var string
     */
    protected $swagShopFinderId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var ShopFinderEntity|null
     */
    protected $swagShopFinder;

    /**
     * @var LanguageEntity|null
     */
    protected $language;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getSwagShopFinderId(): string
    {
        return $this->swagShopFinderId;
    }

    public function setSwagShopFinderId(string $swagShopFinderId): void
    {
        $this->swagShopFinderId = $swagShopFinderId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagShopFinder(): ?ShopFinderEntity
    {
        return $this->swagShopFinder;
    }

    public function setSwagShopFinder(?ShopFinderEntity $swagShopFinder): void
    {
        $this->swagShopFinder = $swagShopFinder;
    }

    public function getLanguage(): ?LanguageEntity
    {
        return $this->language;
    }

    public function setLanguage(?LanguageEntity $language): void
    {
        $this->language = $language;
    }
}
