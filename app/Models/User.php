<?php

namespace App\Models;

use DateTime;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * User Attributes

     * $this->attributes['id'] - string - contains the user primary key (id).
     * $this->attributes['name'] - string - contains the user's name.
     * $this->attributes['password'] - string - contains the password set by user.
     * $this->attributes['address'] - string - contains the user's address.
     * $this->attributes['balance'] - float - contains the user's balance (available and spendable money).
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
        $this->attributes['password'] = Hash::make($password);
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getBalance(): float
    {
        return $this->attributes['balance'];
    }

    public function setBalance(float $balance): void
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

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function getEmailVerifiedAt(): DateTime
    {
        return $this->attributes['email_verified_at'];
    }

    public function getRemember_token(): string
    {
        return $this->attributes['remember_token'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'role' => 'required|string',
            'balance' => 'required|numeric',
        ]);
    }
}
