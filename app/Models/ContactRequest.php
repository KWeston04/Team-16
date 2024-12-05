<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $table = 'contactrequests'; // table name and details
    protected $primaryKey = 'request_id';
    public $timestamps = false;

    protected $fillable = [ // what needs to be sent to get it set up
        'user_id',
        'message',
        'submitted_at',
        'status',
    ];
}
