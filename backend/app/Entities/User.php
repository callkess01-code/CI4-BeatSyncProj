<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    // Map database columns to different property names (if needed)
    protected $datamap = [];

    // Fields that should be cast to DateTime objects
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
        'last_login_at',
        'password_reset_expires_at',
        'date_of_birth',
    ];

    // Type casting for specific fields
    protected $casts = [
        'email_verified' => 'boolean',
        'newsletter_subscribed' => 'boolean',
        'two_factor_enabled' => 'boolean',
        'favorite_genres' => 'json-array',
    ];
}
