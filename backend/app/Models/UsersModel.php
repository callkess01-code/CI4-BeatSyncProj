<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    // Table name from your migration
    protected $table = 'users';

    // Primary key column
    protected $primaryKey = 'id';

    // Use auto-increment integer id
    protected $useAutoIncrement = true;

    // IMPORTANT: Return entity for convenience (not array!)
    protected $returnType = '\App\Entities\User';

    // Enable soft deletes (sets deleted_at instead of deleting)
    protected $useSoftDeletes = true;

    // Protect fields from mass assignment
    protected $protectFields = true;

    // ⚠️ IMPORTANT: These are ALL fields from your migration
    // EXCEPT: id, created_at, updated_at, deleted_at
    protected $allowedFields = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password_hash',
        'phone',
        'date_of_birth',
        'gender',
        'profile_image',
        'bio',
        'user_type',
        'account_status',
        'email_verified',
        'email_verification_token',
        'email_verified_at',
        'newsletter_subscribed',
        'favorite_genres',
        'location_city',
        'location_country',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'password_reset_token',
        'password_reset_expires_at',
        'remember_token',
        'two_factor_enabled',
        'two_factor_secret',
    ];

    // Don't allow empty inserts
    protected bool $allowEmptyInserts = false;

    // Only update changed fields
    protected bool $updateOnlyChanged = true;

    // Type casting for specific fields
    protected array $casts = [];
    protected array $castHandlers = [];

    // ============================================
    // DATES CONFIGURATION
    // ============================================

    // Automatically manage timestamps
    protected $useTimestamps = true;

    // Date format
    protected $dateFormat = 'datetime';

    // Column names for timestamps
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // ============================================
    // VALIDATION
    // ============================================

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // ============================================
    // CALLBACKS
    // ============================================

    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
