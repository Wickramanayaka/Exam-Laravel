<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsMessage extends Model
{
    protected $fillable = ['message', 'user_id'];
    protected $table = 'sms_messages';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
