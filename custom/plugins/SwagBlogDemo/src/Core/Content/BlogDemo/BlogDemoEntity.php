<?php declare(strict_types=1);

namespace SwagBlogDemo\Core\Content\BlogDemo;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagBlogDemo\Core\Content\BlogCategory\BlogCategoryEntity;
use Shopware\Core\Content\Product\ProductCollection;
use SwagBlogDemo\Core\Content\BlogDemo\Aggregate\BlogDemoTranslation\BlogDemoTranslationCollection;

class BlogDemoEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTimeInterface|null
     */
    protected $releaseDate;

    /**
     * @var bool|null
     */
    protected $active;

    /**
     * @var string|null
     */
    protected $swagBlogCategoryId;

    /**
     * @var string|null
     */
    protected $author;

    /**
     * @var BlogCategoryEntity|null
     */
    protected $swagBlogCategory;

    /**
     * @var ProductCollection|null
     */
    protected $products;

    /**
     * @var BlogDemoTranslationCollection|null
     */
    protected $translations;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var array|null
     */
    protected $translated;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getSwagBlogCategoryId(): ?string
    {
        return $this->swagBlogCategoryId;
    }

    public function setSwagBlogCategoryId(?string $swagBlogCategoryId): void
    {
        $this->swagBlogCategoryId = $swagBlogCategoryId;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getSwagBlogCategory(): ?BlogCategoryEntity
    {
        return $this->swagBlogCategory;
    }

    public function setSwagBlogCategory(?BlogCategoryEntity $swagBlogCategory): void
    {
        $this->swagBlogCategory = $swagBlogCategory;
    }

    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    public function setProducts(ProductCollection $products): void
    {
        $this->products = $products;
    }

    public function getTranslations(): BlogDemoTranslationCollection
    {
        return $this->translations;
    }

    public function setTranslations(BlogDemoTranslationCollection $translations): void
    {
        $this->translations = $translations;
    }

    public function getCreatedAt(): \DateTimeInterface
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

    public function getTranslated(): array
    {
        return $this->translated;
    }

    public function setTranslated(?array $translated): void
    {
        $this->translated = $translated;
    }
}
