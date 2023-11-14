<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /**
     * Item ATTRIBUTES
     * $this->attributes['id'] - string - contains the items primary key (id)
     * $this->attributes['quantity'] - string - contains the method quantity
     * $this->attributes['name'] - string - contains the item name
     * $this->attributes['price'] - string - contains the methods price
     * $this->attributes['order_id'] - string - contains the order's id which has the item
     * $this->order - order - contains associated order
     * $this->toy - toy - contains associated toy
     * $this->technique - technique - contains associated technique
     * $this->attributes['created_at'] - string - contains when the review was created
     * $this->attributes['updated_at'] - string - contains when the review was updated
     */
    protected $fillable = ['quantity', 'method', 'price', 'order_id', 'toy_id', 'technique_id'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): string
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(string $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): string
    {
        return $this->attributes['price'];
    }

    public function setPrice(string $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function getOrderId(): string
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function toy(): BelongsTo
    {
        return $this->belongsTo(Toy::class);
    }

    public function getToy(): Toy
    {
        return $this->toy;
    }

    public function setToy(Toy $toy): void
    {
        $this->toy = $toy;
    }

    public function setToyId(int $toyId): void
    {
        $this->attributes['toy_id'] = $toyId;
    }

    public function getToyId(): ?string
    {
        return $this->attributes['toy_id'];
    }

    public function technique(): BelongsTo
    {
        return $this->belongsTo(Technique::class);
    }

    public function getTechnique(): Technique
    {
        return $this->technique;
    }

    public function setTechnique(Technique $technique): void
    {
        $this->technique = $technique;
    }

    public function getTechniqueId(): ?string
    {
        return $this->attributes['technique_id'];
    }

    public function setTechniqueId(int $techniqueId): void
    {
        $this->attributes['technique_id'] = $techniqueId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function stats(): array
    {
        $items = Item::all();
        $toyStats = [];
        foreach ($items as $item) {
            if ($item->getToyId() != null) {
                if (isset($toyStats[$item->getToyId()])) {
                    $toyStats[$item->getToyId()] += $item->getQuantity();
                } else {
                    $toyStats[$item->getToyId()] = $item->getQuantity();
                }
            }
        }

        arsort($toyStats);
        $toyStats = array_slice($toyStats, 0, 3, true);
        $toysCount = $toyStats;
        ksort($toysCount);
        krsort($toyStats);
        $toyStats = Toy::findMany(array_keys($toyStats));
        $toyGroup = [];
        $toyGroup['count'] = $toysCount;
        $toyGroup['stats'] = $toyStats;  

        return $toyGroup;
    }
}
