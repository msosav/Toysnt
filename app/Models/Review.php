<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Review extends Model
{
    /**
     * Review ATTRIBUTES
     * $this->attributes['id'] - string - contains the review´s primary key (id)
     * $this->attributes['comment'] - string - contains the review´s comment
     * $this->attributes['rating'] - float - contains the review´s technique
     * $this->attributes['technique_id'] - string - contains the review´s technique association
     * $this->technique - Technique - contains the review´s technique
     * $this->attributes['toy'] - string - contains the review´s toy
     * $this->toy - Toy - contains the review´s toy
     * $this->attributes['user_id'] - string - contains the review´s user association
     * $this->user - User - contains the review´s user
     * $this->attributes['created_at'] - string - contains when the review was created
     * $this->attributes['updated_at'] - string - contains when the review was updated
     */
    protected $fillable = ['comment', 'rating', 'technique_id', 'toy_id'];

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

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function technique(): BelongsTo
    {
        return $this->belongsTo(Technique::class);
    }

    public function getTechnique(): Technique
    {
        return $this->technique;
    }

    public function getTechniqueId(): ?string
    {
        return $this->attributes['technique_id'];
    }

    public function setTechniqueId(string $techniqueId): void
    {
        $this->attributes['technique_id'] = $techniqueId;
    }

    public function toy(): BelongsTo
    {
        return $this->belongsTo(Toy::class);
    }

    public function getToy(): Toy
    {
        return $this->toy;
    }

    public function getToyId(): ?string
    {
        return $this->attributes['toy_id'];
    }

    public function setToyId(string $toyId): void
    {
        $this->attributes['toy_id'] = $toyId;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getUserId(): string
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(string $userId): void
    {
        $this->attributes['user_id'] = $userId;
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
            'comment' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
        ]);
    }
}
