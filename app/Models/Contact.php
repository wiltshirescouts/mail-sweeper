<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    protected $fillable = [
        'member_id',
        'first_name',
        'last_name',
        'email_address'
    ];

    public function roles() {
        return $this->hasMany(ContactRole::class);
    }

    public function lists() {
        return $this->belongsToMany(MailingList::class);
    }
}
