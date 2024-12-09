<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;

class ContactRequestController extends Controller
{
    public function contact(){
        return view('Contact');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([ // making sure that the input is valid
            'name' => 'required|string|max:127', // no more than 127 chars for name (most if not all names should work in this space)
            'email' => 'required|email|max:127', // no more than 127 chars for email (just in case there is a really long email address)
            'phone' => 'required|string|max:11|min:10', // legit uk numbers should only be this long (according to research most are 11 digits, some are 10)
            'message' => 'required|string', // there must be a message (to prevent spam)
        ]);

        $formattedMessage = "Name: {$validated['name']}\n"
                        . "Email: {$validated['email']}\n"
                        . "Phone: {$validated['phone']}\n"
                        . "Message: {$validated['message']}";

        
        ContactRequest::create([ // saving the requests into the table as a new record
            'user_id' => auth()->id() ?? null, // save the user ID if authenticated or null if it isn't
            'message' => $formattedMessage, // the actual message that was made
            'submitted_at' => now(), // the timestamp (was created just now)
            'status' => 'delivered', // the initial status (we recieved it, later we can set it to responded)
        ]);

        // dependent on if things have gone well, return with the success message
        return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    }
}
