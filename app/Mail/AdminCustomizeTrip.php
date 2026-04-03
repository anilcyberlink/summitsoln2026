<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Settings\SettingModel;
use Illuminate\Http\Request;

class AdminCustomizeTrip extends Mailable
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
        // dd($request->all());
        $data = SettingModel::where('id',1)->first();
        $mail=$request->email;
        $name=$request->name;
        $guest=$request->guest;
        $contact=$request->phone;
        $message=$request->comments;
        $trip_id=$request->trip_id;
        $num_ppl=$request->no_of_people;
        $duration = $request->duration;
        $date = $request->trip_start_date;
        $country = $request->country;
        $email = $data->email_secondary;
        return $this->view('emails.adminCustomize', ['mail' => $mail,'name'=>$name,'guest'=>$guest,'contact'=>$contact,'messages'=>$message,
        'trip_id'=>$trip_id,'num_ppl'=>$num_ppl,'duration'=> $duration, 'date'=> $date, 'country'=> $country])->subject('Customise Trip')->to($email);
    }
}
