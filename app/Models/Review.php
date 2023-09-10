<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * Review ATTRIBUTES
     * $this->attributes['id'] - string - contains the review´s primary key (id)
     * $this->attributes['comment'] - string - contains the review´s comment
     * $this->attributes['rating'] - string - contains the review´s technique
     * $this->attributes['technique_id'] - string - contains the review´s technique association
     * $this->attributes['created_at'] - string - contains when the technique was created
     * $this->attributes['updated_at'] - string - contains when the technique was updated
     */
    protected $fillable = ['model', 'image', 'description', 'price'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getComment(): string
    {
        return $this->attributes['comment'];
    }

    public function setComment(string $comment): void
    {
        $this->attributes['comment'] = $comment;
    }

    public function getRating(): string
    {
        return $this->attributes['rating'];
    }

    public function setRating(string $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getTechniqueId(): string
    {
        return $this->attributes['technique_id'];
    }

    public function setTechniqueId(string $techniqueId): void
    {
        $this->attributes['technique_id'] = $techniqueId;
    }

    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdated_at(): string
    {
        return $this->attributes['updated_at'];
    }
}
