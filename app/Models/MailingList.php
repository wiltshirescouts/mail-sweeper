<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingList extends Model {
    protected $fillable = [
        'name',
        'description'
    ];

    public function emails() {
        return $this->belongsToMany(Email::class);
    }

    public function tags() {
        return $this->hasManyThrough(Tag::class, MailingListTag::class, 'tag_id', 'id', 'id', 'tag_id');
    }

    public function contacts() {
        return $this->tags()->join(ContactTag::class, 'tag_id')->join(Contact::class, 'contact_id')->select('contacts.*');
    }
}
