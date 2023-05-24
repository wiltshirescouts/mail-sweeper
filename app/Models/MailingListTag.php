<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingListTag extends Model {
    protected $fillable = [
        'tag_id',
        'mailing_list_id'
    ];

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function mailingList() {
        return $this->belongsTo(MailingList::class);
    }
}
