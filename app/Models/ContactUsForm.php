<?php

namespace App\Models;

use App\Enums\RequestStatus;
use App\Observers\ContactUsFormObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

#[ObservedBy(ContactUsFormObserver::class)]
class ContactUsForm extends Model
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        'status' => RequestStatus::class,
    ];
}
