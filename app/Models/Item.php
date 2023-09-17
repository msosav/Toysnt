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

    function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /*
    function getOrder(): Order
    {
        return $this->order;
    }
    */

    function toy(): BelongsTo
    {
        return $this->belongsTo(Toy::class);
    }

    function getToy(): Toy
    {
        return $this->toy;
    }

    function setToy(Toy $toy): void
    {
        $this->toy = $toy;
    }

    function technique(): BelongsTo
    {
        return $this->belongsTo(Technique::class);
    }

    function getTechnique(): Technique
    {
        return $this->technique;
    }

    function setTechnique(Technique $technique): void
    {
        $this->technique = $technique;
    }
}
