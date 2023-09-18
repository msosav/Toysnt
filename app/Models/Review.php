<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /**
     * Review ATTRIBUTES
     * $this->attributes['id'] - string - contains the review´s primary key (id)
     * $this->attributes['comment'] - string - contains the review´s comment
     * $this->attributes['rating'] - string - contains the review´s technique
     * $this->attributes['technique_id'] - string - contains the review´s technique
     * $this->technique - technique - contains the review´s technique
     * $this->attributes['toy_id'] - string - contains the review´s toy
     * $this->toy - toy - contains the review´s toy
     * $this->attributes['user_id'] - string - contains the review´s user
     * $this->user - user - contains the review´s user
     * $this->attributes['created_at'] - string - contains when the review was created
     * $this->attributes['updated_at'] - string - contains when the review was updated
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

    public function getTechnique_id(): string
    {
        return $this->attributes['technique_id'];
    }

    public function setTechnique_id(string $technique_id): void
    {
        $this->attributes['technique_id'] = $technique_id;
    }

    public function technique(): BelongsTo
    {
        return $this->belongsTo(Technique::class);
    }

    public function setTechnique(Technique $technique): void
    {
        $this->technique = $technique;
    }

    public function getTechnique(): Technique
    {
        return $this->technique;
    }

    public function getToy_id(): string
    {
        return $this->attributes['toy_id'];
    }

    public function setToy_id(string $toy_id): void
    {
        $this->attributes['toy_id'] = $toy_id;
    }

    public function toy(): BelongsTo
    {
        return $this->belongsTo(Toy::class);
    }

    public function setToy(Toy $toy): void
    {
        $this->toy = $toy;
    }

    public function getToy(): Toy
    {
        return $this->toy;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
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
