<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\User\UserTypeEnum;
use App\Traits\PropertiesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, PropertiesTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'avatar_id',
        'type',
        'phone',
        'email',
        'password',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'active'            => 'boolean'
    ];



    /**
     * @return HasOne
     */
    public function avatar(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'avatar_id');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeClient(Builder $builder): Builder
    {
        return $builder->where('type', UserTypeEnum::CLIENT->value);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeEmployees(Builder $builder): Builder
    {
        return $builder->where('type', UserTypeEnum::EMPLOYEES->value);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeAdmin(Builder $builder): Builder
    {
        return $builder->where('type', UserTypeEnum::ADMIN->value);
    }
}
