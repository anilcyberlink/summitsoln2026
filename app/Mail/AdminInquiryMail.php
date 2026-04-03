<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;

class AdminInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {   
        $data = SettingModel::where('id',1)->first();
        $trip_id=$request->trip_id;
        $name=$request->name;
        $mail=$request->email;
        $contact=$request->number;
        $country = $request->country;
        $message=$request->message;
        $to = $data->email_secondary;
        return $this->view('emails.admin-inquiry', [
        'name'=>$name,
        'mail' => $mail,
        'contact'=>$contact,
        'country'=>$country,
        'messages'=>$message,
        'trip_id'=>$trip_id,
        ])->subject('Trip Inquiry')->to($to);
    }
}
