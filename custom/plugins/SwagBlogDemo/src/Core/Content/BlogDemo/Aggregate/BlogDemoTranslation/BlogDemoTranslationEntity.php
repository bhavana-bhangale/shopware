<?php declare(strict_types=1);

namespace SwagBlogDemo\Core\Content\BlogDemo\Aggregate\BlogDemoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagBlogDemo\Core\Content\BlogDemo\BlogDemoEntity;
use Shopware\Core\System\Language\LanguageEntity;

class BlogDemoTranslationEntity extends Entity
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
    protected $swagBlogDemoId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var BlogDemoEntity|null
     */
    protected $swagBlogDemo;

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

    public function getSwagBlogDemoId(): string
    {
        return $this->swagBlogDemoId;
    }

    public function setSwagBlogDemoId(string $swagBlogDemoId): void
    {
        $this->swagBlogDemoId = $swagBlogDemoId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagBlogDemo(): ?BlogDemoEntity
    {
        return $this->swagBlogDemo;
    }

    public function setSwagBlogDemo(?BlogDemoEntity $swagBlogDemo): void
    {
        $this->swagBlogDemo = $swagBlogDemo;
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
