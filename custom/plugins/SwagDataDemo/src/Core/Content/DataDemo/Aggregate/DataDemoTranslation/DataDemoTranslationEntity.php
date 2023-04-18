<?php declare(strict_types=1);

namespace SwagDataDemo\Core\Content\DataDemo\Aggregate\DataDemoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagDataDemo\Core\Content\DataDemo\DataDemoEntity;
use Shopware\Core\System\Language\LanguageEntity;

class DataDemoTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $city;

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
    protected $swagDataDemoId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var DataDemoEntity|null
     */
    protected $swagDataDemo;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
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

    public function getSwagDataDemoId(): string
    {
        return $this->swagDataDemoId;
    }

    public function setSwagDataDemoId(string $swagDataDemoId): void
    {
        $this->swagDataDemoId = $swagDataDemoId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagDataDemo(): ?DataDemoEntity
    {
        return $this->swagDataDemo;
    }

    public function setSwagDataDemo(?DataDemoEntity $swagDataDemo): void
    {
        $this->swagDataDemo = $swagDataDemo;
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
