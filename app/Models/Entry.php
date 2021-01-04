<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model {
    use HasFactory;

    protected $fillable = ['description', 'category', 'amount', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
