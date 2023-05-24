<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

    protected $fillable = [
        'type',
        'name',
        'content',
    ];

    public function email() {
        return $this->belongsTo(Email::class);
    }
}
