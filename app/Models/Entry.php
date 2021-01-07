<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model {
    use HasFactory;

    protected $fillable = ['description', 'category', 'amount', 'spend_date', 'user_id', 'month', 'year'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
