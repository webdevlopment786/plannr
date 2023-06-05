<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateInvitation extends Model
{
    use HasFactory;
    protected $table = 'create_invitation';

    protected $fillable = [
        'name','date','time','zone','location','phone','message',
        'type_events','dress_code','food','add_info','add_admin',
        'add_chat_room','invite_more','hosted_by'
    ];
}
