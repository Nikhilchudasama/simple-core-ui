<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use App\Models\UserMeta;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    public function userMeta()
    {
        return $this->hasOne(UserMeta::class, 'user_id');
    }
}
