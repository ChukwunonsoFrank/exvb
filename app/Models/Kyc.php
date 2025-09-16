<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kyc extends Model
{
    protected $fillable = ['user_id', 'fullname', 'country', 'id_image_path', 'status'];

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
