<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class Order extends Model
{
    /**
     * Order ATTRIBUTES
     * $this->attributes['id'] - string - contains the order primary key (id)
     * $this->attributes['total'] - float - contains the purchase total value
     * $this->attributes['user_id'] - string - contains the user's id whom made the purchase
     * $this->attributes['address'] - string - contains the preffered address for a specific purchase
     * $this->user - user - contains associated user
     * $this->attributes['created_at'] - string - contains when the review was created
     * $this->attributes['updated_at'] - string - contains when the review was updated
     */
    protected $fillable = ['total', 'user_id', 'address'];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getTotal(): string
    {
        return $this->attributes['total'];
    }

    public function setTotal(string $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getUserId(): string
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(string $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
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