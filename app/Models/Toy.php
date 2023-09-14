<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Toy extends Model
{
    /**
     * Toy ATTRIBUTES
     * $this->attributes['id'] - string - contains the pet primary key (id)
     * $this->attributes['model'] - string - contains the toy model
     * $this->attributes['image'] - string - contains the toy image path
     * $this->attributes['description'] - string - contains the toy description
     * $this->attributes['price'] - float - contains the toy price
     * $this->attributes['stock'] - int - contains the toy stock
     * $this->attributes['created_at'] - string - contains when the toy was created
     * $this->attributes['updated_at'] - string - contains when the toy was updated
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

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdated_at(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request, array $include, array $exclude): void
    {
        if (in_array('model', $include) or ! in_array('model', $exclude)) {
            $request->validate([
                'model' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'model' => 'string|max:255',
            ]);
        }

        if (in_array('toy_image', $include) or ! in_array('toy_image', $exclude)) {
            $request->validate([
                'toy_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } else {
            $request->validate([
                'toy_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
        }

        if (in_array('description', $include) or ! in_array('description', $exclude)) {
            $request->validate([
                'description' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'description' => 'string|max:255',
            ]);
        }

        if (in_array('price', $include) or ! in_array('price', $exclude)) {
            $request->validate([
                'price' => 'required|numeric',
            ]);
        } else {
            $request->validate([
                'price' => 'numeric',
            ]);
        }

        if (in_array('stock', $include) or ! in_array('stock', $exclude)) {
            $request->validate([
                'stock' => 'required|numeric',
            ]);
        } else {
            $request->validate([
                'stock' => 'numeric',
            ]);
        }
    }
}
