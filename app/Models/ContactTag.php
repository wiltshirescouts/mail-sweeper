<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTag extends Model {
    protected $fillable = [
        'tag_id',
        'contact_id'
    ];

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }
}
