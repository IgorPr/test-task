<?php

namespace App\Model;

use Pimcore\Logger;
use Pimcore\Model\AbstractModel;
use Pimcore\Model\Exception\NotFoundException;

final class Filter extends AbstractModel
{
    private ?int $id = null;

    private string $name;

    private int $productId;

    private int $categoryId;

    private array $colors;

    private int $type;

    public function getById(int $id): ?self
    {
        try {
            $obj = new self;
            $obj->getDao()->getById($id);

            return $obj;
        }
        catch (NotFoundException $ex) {
            Logger::warn("Vote with id $id not found");
        }

        return null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function addColor(string $color): self
    {
        if (!in_array($color, $this->colors)) {
            $this->colors[] = $color;
        }

        return $this;
    }
}
