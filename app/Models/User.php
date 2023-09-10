<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * User Attributes

     * $this->attributes['id'] - int - contains the user primary key (id).
     * $this->attributes['name'] - string - contains the user's name.
     * $this->attributes['password'] - string - contains the password set by user.
     * $this->attributes['address'] - string - contains the user's address.
     * $this->attributes['balance'] - int - contains the user's balance (available and spendable money).
     * $this->attributes['role'] - string - contains the user's role in the app.
     * $this->attributes['created_at'] - datetime - contains the date when the user was created.
     * $this->attributes['updated_at'] - datetime - contains the last date when the user was modified.
     * $this->attributes['email_verified_at'] - datetime - contains the date when the user's email was verified.
     * $this->attributes['remember_token'] - string - contains the user's remember token.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getId(): int
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

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }
}
