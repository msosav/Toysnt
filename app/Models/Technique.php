<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    /**
     * Technique ATTRIBUTES
     * $this->attributes['id'] - string - contains the pet primary key (id)
     * $this->attributes['model'] - string - contains the technique model
     * $this->attributes['image'] - string - contains the technique image path
     * $this->attributes['description'] - string - contains the technique description
     * $this->attributes['price'] - float - contains the technique price
     * $this->attributes['created_at'] - date - contains when the technique was created
     * $this->attributes['updated_at'] - float - contains when the technique was updated
     */

    protected $fillable = ['model', 'image', 'description', 'price'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getModel(): string
    {
        return $this->attributes['model'];
    }

    public function setModel(string $model): void
    {
        $this->attributes['model'] = $model;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getCreated_at(): float
    {
        return $this->attributes['created_at'];
    }

    public function getUpdated_at(): float
    {
        return $this->attributes['updated_at'];
    }
}
