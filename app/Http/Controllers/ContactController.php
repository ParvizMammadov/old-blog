<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessage;
use App\Mail\Message;
use App\Models\Category;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class ContactController extends Controller
{
    public function contact() {
        return view('contact');
    }

    public function sendMail(SendMessage $request) {
        $validated = $request->validated();

        $mail = new Mail;
        $mail->name = $request->fullname;
        $mail->email = $request->email;
        $mail->phone = $request->phone;
        $mail->message = $request->message;

        $mail->save();

        FacadesMail::to('someone@test.com')->send(new Message($mail));

        return redirect()->route('contact')->with('success', 'Your message sent successfully!');
    }
}
