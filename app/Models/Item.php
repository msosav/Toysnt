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
     * $this->attributes['method'] - string - contains the methods name
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

    public function getMethod(): string
    {
        return $this->attributes['method'];
    }

    public function setMethod(string $method): void
    {
        $this->attributes['method'] = $method;
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}