<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Technique extends Model
{
    /**
     * Technique ATTRIBUTES
     * $this->attributes['id'] - string - contains the technique primary key (id)
     * $this->attributes['name'] - string - contains the technique name
     * $this->attributes['image'] - string - contains the technique image path
     * $this->attributes['description'] - string - contains the technique description
     * $this->attributes['price'] - float - contains the technique price
     * $this->attributes['created_at'] - string - contains when the technique was created
     * $this->attributes['updated_at'] - string - contains when the technique was updated
     */
    protected $fillable = ['name', 'image', 'description', 'price'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
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

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
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

        if (in_array('technique_image', $include) or ! in_array('technique_image', $exclude)) {
            $request->validate([
                'technique_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } else {
            $request->validate([
                'technique_image' => 'image|mimes:jpeg,png,jpg|max:2048',
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
    }

    public static function stats(): array
    {
        $techniques = Technique::all();
        $techniqueStats = [];
        $count = 0;
        $temp = 0;
        foreach ($techniques as $technique) {
                foreach ($technique->getReviews() as $review) {
                    $temp += $review->getRating();
                    $count += 1;
                }
                if ($count > 0) {
                    $techniqueStats[$technique->getId()] = $temp/$count;
                } else {
                    $techniqueStats[$technique->getId()] = 0;
                }
                $count = 0;
                $temp = 0;
        }
        arsort($techniqueStats);
        $techniqueStats = array_slice($techniqueStats, 0, 3, true);
        $techniquesRating = $techniqueStats;
        ksort($techniquesRating);
        krsort($techniqueStats);
        $techniqueStats = Technique::findMany(array_keys($techniqueStats));
        $techniqueGroup = [];
        $techniqueGroup['rating'] = $techniquesRating;
        $techniqueGroup['stats'] = $techniqueStats;  

        return $techniqueGroup;
    }
}
