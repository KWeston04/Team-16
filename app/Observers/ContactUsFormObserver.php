<?php

namespace App\Observers;

use App\Filament\Resources\ContactUsFormResource;
use App\Mail\NewContactUsFormRequest;
use App\Models\ContactUsForm;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class ContactUsFormObserver
{
        /**
     * Handle the ContactUsForm "created" event.
     */
    public function created(ContactUsForm $contactUsForm): void
    {
        Mail::to(config('mail.to.address'))->queue(new NewContactUsFormRequest($contactUsForm)); // send email

        // Get all users with type 'Admin'
        $admins = User::where('user_type', 'admin')->get();

        // Send notification to each admin
        Notification::make()
            ->icon('heroicon-o-inbox')
            ->iconColor('info')
            ->title('New Contact Request.')
            ->body('From: ' . $contactUsForm->email . '.')
            ->actions([
                Action::make('View')
                    ->url(ContactUsFormResource::getUrl('edit', ['record' => $contactUsForm])),
                Action::make('markRead')
                    ->markAsRead()
                    ->color('primary'),
                Action::make('markUnread')
                    ->markAsUnread()
                    ->color(color: 'warning'),
            ])
            ->sendToDatabase($admins);
    }
}
