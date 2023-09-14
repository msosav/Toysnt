<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Technique extends Model
{
    /**
     * Technique ATTRIBUTES
     * $this->attributes['id'] - string - contains the technique primary key (id)
     * $this->attributes['model'] - string - contains the technique model
     * $this->attributes['image'] - string - contains the technique image path
     * $this->attributes['description'] - string - contains the technique description
     * $this->attributes['price'] - float - contains the technique price
     * $this->attributes['created_at'] - string - contains when the technique was created
     * $this->attributes['updated_at'] - string - contains when the technique was updated
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

    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdated_at(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'technique_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
    }

    public static function validateUpdate(Request $request): void
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'technique_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
    }
}
