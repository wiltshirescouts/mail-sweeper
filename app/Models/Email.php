<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model {

    protected $fillable = [
        'sent_at',
        'user_id',
        'mailing_list_id',
        'subject',
        'body_html',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function list() {
        return $this->belongsTo(MailingList::class);
    }

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }
}
