<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        Mail::raw(
            "Naam: " . $validated['name'] . "\n" .
            "E-mail: " . $validated['email'] . "\n" .
            "Onderwerp: " . $validated['subject'] . "\n\n" .
            "Bericht:\n" . $validated['message'],
            function ($message) use ($validated) {
                $message->to('admin@ehb.be')
                    ->subject('Nieuw contactbericht: ' . $validated['subject']);
            }
        );

        return redirect()->route('contact.create')
            ->with('success', 'Je bericht werd verzonden.');
    }
}