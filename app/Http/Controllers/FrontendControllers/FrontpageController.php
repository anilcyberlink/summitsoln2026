<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Models\Inquiry\Emergency;
use App\Models\Inquiry\Insurance;
use App\Models\Team\TeamCategory;
use Newsletter;
use App\Mail\BookTrip;
use App\Mail\SendMail;
use App\Model\Contact;
use App\Mail\VerifyMail;
use App\Mail\SendInquiry;
use App\Model\Subscriber;
use App\Model\TripReview;
use App\Model\VerifyUser;
use App\Model\TripBooking;
use Illuminate\Support\Str;
use App\Model\VerifyContact;
use Illuminate\Http\Request;
use App\Mail\BookingComplete;
use App\Mail\SendMailContact;
use App\Mail\AdminBookingMail;
use App\Mail\EnrollmentMail;
use App\Mail\AdminInquiryMail;
use App\Models\Team\TeamModel;
use App\Models\Posts\PostModel;
use App\Mail\AdminCustomizeTrip;
use App\Mail\AdminTailorMadeMail;
use App\Models\Travels\TripModel;
use App\Models\Travels\TripBanner;
use App\Models\Banners\BannerModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Travels\RegionModel;
use App\Http\Controllers\Controller;
use App\Models\Inquiry\BookingModel;
use Illuminate\Support\Facades\Mail;
use App\Models\Inquiry\FlightDetails;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripGearModel;
use App\Models\Cost\CostExcludesModel;
use App\Models\Cost\CostIncludesModel;
use App\Models\Inquiry\CustomizeModel;
use App\Models\Travels\TripGroupModel;
use App\Models\Posts\PostCategoryModel;
use Illuminate\Support\Facades\Session;
use App\Models\HomeBrief\HomeBriefModel;
use App\Models\Inquiry\TripInquiryModel;
use App\Models\Posts\AssociatedPostModel;
use Illuminate\Support\Facades\Validator;
use App\Models\Inquiry\TripFilmMakingModel;
use App\Models\Inquiry\TripTailormadeModel;
use App\Models\Travels\ActivityBannerModel;
use App\Models\Destinations\DestinationModel;
use App\Models\Destinations\DestinationBannerModel;
use App\Models\Destinations\DestinationActivityrelModel;
use App\Models\Posts\PostImageModel;
/******************* Sangam starts *****************/
use App\Http\Controllers\HBLController;
use App\Models\Inquiry\EnrollmentModel;

/******************* Sangam ends *****************/

class FrontpageController extends Controller
{
    public function index()
    {
        $banners = BannerModel::all();
        $homeBrief = HomeBriefModel::where('id', 1)->first();
        $whoweare = PostModel::where('id', '157')->first();
        $whywork= PostModel::where('id',149)->first();
        $images=PostImageModel::where('post_id',148)->get();
        $famous_trips = TripModel::where(['video_status' => '1', 'status' => '1'])->orderBy('ordering', 'asc')->get();
        $trekking = TripModel::where(['trip_type' => '1', 'status' => '1'])->take(8)->get();
        $expedition = ActivityModel::where('activity_parent','expedition')->orderBy('ordering','asc')->get();
        $expeditionParent = ActivityModel::where(['id'=>'58'])->first();
        $tripofMonth = TripModel::where('trip_of_the_month', '1')->first();
        $reviews = TripReview::where('status', 1)->orderBy('created_at', 'desc')->get();
        $team = AssociatedPostModel::where(['post_id' => '125'])->where('show_in_home',1)->limit(2)->get();
        $guide= PostModel::where('id',125)->first();
        $activity_list =  ActivityModel::where(['activity_parent'=>'activity'])->orderBy('ordering', 'asc')->get();
        $destination = DestinationModel::where('status', '1')->take(4)->get();
        $sevenSummit = ActivityModel::where(['id'=>'55'])->first();
        $package_list = collect();
        if ($sevenSummit) {
            $tripIds = $sevenSummit->trips()->pluck('trip_id');
            $package_list = TripModel::whereIn('id', $tripIds)->get();
        }
        $packages = ActivityModel::where('activity_parent','package')->orderBy('ordering','asc')->take(2)->get();
        $aboutUs = PostTypeModel::where(['status'=>'1','is_menu'=>'1','id' => '22'])->orderBy('ordering','asc')->first(); 
        $blog = PostTypeModel::where('id', '33')->first();
        $blogs = PostModel::where(['post_type' => $blog->id])->orderBy('post_order', 'desc')->take(2)->get();
        $contact = PostTypeModel::where('id', '26')->first();
        // dd($packages);
        return view('themes.default.frontpage', compact('banners','homeBrief','whoweare','famous_trips','trekking','expedition','tripofMonth','blog','blogs','reviews','contact','images','whywork','team','guide','activity_list','destination','expeditionParent','sevenSummit','package_list','packages','aboutUs'));
    }


    public function posttype(Request $request, $uri)
    {
        if (!check_posttype_uri($uri)) {
            abort(404);
        }
        $data = PostTypeModel::where('uri', $uri)->first();
        $tmpl['template'] = 'page';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }
        $multiphotos = '';
        if ($data) {
            // $posts = PostModel::where(['post_type' => $data->id, 'status' => '1', 'post_parent' => '0'])->orderBy('post_order', 'asc')->paginate(16);
            $query = PostModel::where(['post_type' => $data->id, 'status' => '1', 'post_parent' => '0'])->orderBy('post_order', 'asc');
            
            $posts = $query->paginate($data->uri === 'blog' ? 4 : 16);
            $multiphotos = PostImageModel::where('post_id', $posts->first()?->id)->latest()->get();
            
        }
        $team_category = TeamCategory::where(['team_parent'=>'0' , 'status'=> 1])->get();
        $related_teams =  TeamModel::all()->groupBy('category');
        $packages = ActivityModel::where('activity_parent','package')->orderBy('ordering','asc')->get();
        // dd($posts ,$data);
        $trips=TripModel::where('status','1')->get();
        return view('themes.default.' . $data['template'] . '', compact('data', 'posts','multiphotos','team_category','related_teams','packages','trips'));
    }


    public function pagedetail($uri)
    {
        if (!check_uri($uri)) {
            abort(404);
        }
        $data['template'] = 'single';
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $associated_posts = array();
        if ($data) {
            $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->paginate(12);
        }

        if ($data['template']) {
            $data['template'] = $data['template'];
        }
        if ($data->id) {
            $data->visiter = $data->visiter + 1;
            $data->save();
        }
        $post_type = PostTypeModel::where('id', $data['post_type'])->first();
        $data_child = PostModel::where('post_parent', $data['id'])->orderBy('post_order', 'desc')->paginate(9);
        $related = PostModel::where('post_type', $data['post_type'])->where('post_parent', '=', 0)->orderBy('post_order', 'asc')->get();
        $related_child = PostModel::where('post_parent', $data['post_parent'])->orderBy('post_order', 'desc')->take(5)->get();
        $multiphotos = PostImageModel::where('post_id', $data['id'])->orderBy('id', 'desc')->get();
        $terms_policy = PostModel::where(['post_type' => '16', 'status' => '1', 'post_parent' => '0'])->get();

        $sidebar = PostModel::where('post_type', $data['post_type'])->where(['post_parent' => '0', 'status' => '1'])->where('id', '!=', '120')->get();

        $blog_child = PostModel::where(['post_type' => $data['post_type'], 'post_parent' => '122'])->paginate(2);
        $team = TeamModel::all();
        $faq =  AssociatedPostModel::where('post_id', '130')->get();

        $review = TripReview::where('status', '1')->orderBy('id', 'desc')->paginate(5);
        $setting = SettingModel::where('id', 1)->first();
        // dd($sidebar,$associated_posts);
        return view('themes.default.' . $data['template'] . '', compact(
            'data',
            'blog_child',
            'review',
            'related_child',
            'faq',
            'related',
            'team',
            'associated_posts',
            'post_type',
            'terms_policy',
            'sidebar',
            'data_child',
            'setting',
            'multiphotos'
        ));
    }

    public function pagedetail_child($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }
        $data_child = PostModel::where('id', $data['post_parent'])->first();
        if ($data_child) {

            $data['template'] = $data_child['template_child'];
        }
        $associated_posts = array();
        if ($data) {
            $associated_posts = AssociatedPostModel::where('post_id', $data['id'])->get();
        }

        return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'associated_posts'));
    }


    /***********************************
     ******** Root Navigation ***********
     ************************************/


    public function tripdetail($uri)
    {
        $data = TripModel::where('uri', $uri)->orWhere('trip_code', $uri)->first();
        $local = PostTypeModel::whereIn('id', ['20', '19'])->get();
        if ($data->id) {
            $itinerary = $data->itineraries()->orderBy('ordering', 'asc')->get();
            $schedules = $data->schedules()->orderBy('ordering', 'asc')->get();
            $faqs = $data->faqs()->orderBy('ordering', 'asc')->get();
            $cost_includes = CostIncludesModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $cost_excludes = CostExcludesModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $photo_videos = TripGearModel::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $photos = TripGearModel::where('trip_detail_id', $data->id)->where('thumbnail', '!=', 'NULL')->orderBy('ordering', 'asc')->get();
            $videos = TripGearModel::where('trip_detail_id', $data->id)->where('video', '!=', 'NULL')->orderBy('ordering', 'asc')->get();
            $trip_review = TripReview::where('trip_id', $data->id)->where('status', 1)->orderBy('created_at', 'desc')->get();
            $banner = TripBanner::where('trip_detail_id', $data->id)->orderBy('ordering', 'asc')->get();
            $visiter = $data->visiter + 1;
            $data->visiter = $visiter;
            $data->save();
        }
        $tripId = TripModel::where('uri', $uri)->first();
        $tripUri = $uri;
        $similar_tripsId= $tripId->relatedtrips()->pluck('related_trip_id');
        if ($similar_tripsId->isNotEmpty()) {
            $similar_trips = TripModel::whereIn('id', $similar_tripsId)->take(3)->get();
        }
        else{
            $similar_trips = TripModel::where('uri', '!=', $uri)->orderBy('ordering', 'desc')->take(3)->get();
        }
        $activity = TripModel::find($data->id)->activities()->get();

        $setting = SettingModel::where('id',1)->first();
        return view('themes.default.tripdetail', compact('data', 'trip_review',
            'cost_includes', 'cost_excludes', 'itinerary',
            'photo_videos', 'activity','similar_trips','photos','videos','local','banner','setting','schedules','faqs','tripId', 'tripUri'));
    }  

    //<------------------------------------------Activity Frontend---------------------------------------------->

    public function travellist($uri)
    {
        $data = ActivityModel::where('uri', $uri)->first();
        $template = $data->template;
        $trips = ActivityModel::find($data->id)->trips()->where('status','1')->orderBy('ordering','asc')->paginate(6);
        $trips_activity = ActivityModel::find($data->id)->trips()->where('status','1')->orderBy('ordering','asc')->get();
        $destination = DestinationModel::all();
        $activity = ActivityModel::where(['status' => '1'])->orderBy('ordering', 'asc')->orderBy('ordering', 'asc')->get();
        $tailor_made = ActivityModel::where('id', 17)->first();
        $banner =  ActivityBannerModel::where('activity_id', $data->id)->get();
        $similar_activity = $data->relatedActivities;
        $extension = TripGroupModel::where('id', 4)->first();
        return view('themes.default.' . $template, compact('data', 'trips', 'trips_activity', 'similar_activity', 'activity', 'destination', 'banner', 'tailor_made', 'extension'));
    }

    public function regionlist($uri)
    {
        $data = RegionModel::where('uri', $uri)->first();
        $template = $data->template;
        $trips = RegionModel::find($data->id)->trips()->where('status', '1')->orderBy('ordering', 'asc')->paginate(9);
        return view('themes.default.trekking-regionlist', compact('data', 'trips'));
    }

    public function destinationtriplist($uri)
    {
        $data = DestinationModel::where('uri', $uri)->first();
        $banner = DestinationBannerModel::where('banner_id', $data->id)->get();
        $expeditions = DestinationModel::where('id', '<>', $data->id)->get();
        $trips = DestinationModel::find($data->id)->trips()->where('status', '1')->orderBy('ordering', 'asc')->paginate(8);
        $tailor_made = TripGroupModel::where('id', 4)->first();
        $destinationActivity = DestinationActivityrelModel::where('destination_id', $data->id)->get();
        $activity = ActivityModel::get();
        // dd($activity,$expeditions[0]->thumbnail);
        return view('themes.default.destination-trip', compact(
            'data',
            'trips',
            'expeditions',
            'banner',
            'tailor_made',
            'destinationActivity',
            'activity'
        ));
    }


    //  <! ---Booking a Trip Controller--- !>
    public function post_tripbooking(Request $request)
    {
        $setting = SettingModel::where('id', 1)->first();
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if ($result->success == true) {
            if ($request->isMethod('post')) {
                $request->validate([
                    'trip_name' => 'required',
                    'total_travellers' => 'required',
                    'full_name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'nationality' => 'required',
                    'address' => 'required',
                    'zip' => 'required',
                    'country' => 'required',
                    'passport_number' => 'required',
                    'passport_expire' => 'required',
                    'dob' => 'required',
                    'emergency_fullname' => 'required',
                    'emergency_relation' => 'required',
                    'emergency_phone_no' => 'required',
                    'emergency_email' => 'required',
                    'emergency_address' => 'required',
                    'emergency_zip' => 'required',
                    'emergency_country' => 'required',
                    'payment_type' => 'required|in:hbl-pay,wire,cheque',
                ]);
                $trip = TripModel::where('id', $request->trip_id)->first();
                $create = BookingModel::create([
                    'trip_id' => $request->trip_id,
                    'title' => $trip->trip_title,
                    'full_name' => $request->full_name,
                    'total_travellers' => $request->total_travellers,
                    'nationality' => $request->nationality,
                    'country' => $request->country,
                    'address' => $request->address,
                    'zip' => $request->zip,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'tshirt_size' => $request->tshirt_size,
                    'phone' => $request->phone,
                    'medication' => $request->medication,
                    'restrictions' => $request->restrictions,
                    'trip_start_date' => $request->trip_start_date,
                    'trip_end_date' => $request->trip_end_date,
                    'trip_days' => $request->trip_days,
                    'dob' => $request->dob,
                    'passport_number'=> $request->passport_number,
                    'passport_expire'=> $request->passport_expire,
                    'payment_type'=> $request->payment_type,
                    'hear' => $request->hear,
                    'paid_status' => 0,
                ]);
                if ($create) {
                    if($request->has_arrival_detail == 1){
                        $flight = FlightDetails::create([
                            'booking_id'=> $create->id,
                            'airline_name' => $request->airline_name,
                            'airline_no' => $request->airline_no,
                            'arrival_from' => $request->arrival_from,
                            'arrival_date'=> $request->arrival_date,
                            'arrival_time'=> $request->arrival_time. ' '.$request->time1
                            
                        ]);
                        if($flight && $request->has_departure_detail == 1){
                            $flight->update([
                                'departure_airline_name' => $request->departure_airline_name,
                                'departure_airline_no' => $request->departure_airline_no,
                                'departure_from' => $request->departure_from,
                                'departure_date'=> $request->departure_date,
                                'departure_time'=> $request->departure_time. ' '.$request->time2
                            ]);
                        }
                    }
                    if($request->has_insurance_detail == 1){
                        $insurance = Insurance::create([
                            'booking_id'=> $create->id,
                            'insurance_company' => $request->insurance_company,
                            'insurance_phone' => $request->insurance_phone,
                            'policy_no' => $request->policy_no
                        ]);

                    }
                    $emergency_info = Emergency::create([
                        'booking_id'=> $create->id,
                        'emergency_fullname' => $request->emergency_fullname,
                        'emergency_relation' => $request->emergency_relation,
                        'emergency_phone_no' => $request->emergency_phone_no,
                        'emergency_email' => $request->emergency_email,
                        'emergency_address' => $request->emergency_address,
                        'emergency_zip' => $request->emergency_zip,
                        'emergency_country' => $request->emergency_country
                    ]);
                    if($request->payment_type == 'hbl-pay'){
                        $data = [
                            'booking_id' => $create->id,
                            'total_price' => $trip->price * $request->total_travellers,
                            'trip_id' => $request->trip_id
                        ];
                        $dataJson = urlencode(json_encode($data));
                        return redirect()->route('himalayan.payment.verify', ['data' => $dataJson]);
                    }
                    // return new AdminBookingMail();
                    // return new BookTrip($request->email);  
                    Mail::send(new AdminBookingMail($setting->email_secondary));
                    Mail::send(new BookTrip($request->email));
                    $name = $request->full_name;
                    $message = "<p>Thanks for your booking request. One of our team will be in touch soon to confirm details.</p>
                    <p>We’re looking forward to welcoming you to Adventure Sherpa Tracks!</p>";
                    return view('themes.default.booking-success', compact('name', 'message'));
                    //  return back()->with('success','Booking form submitted successfully');
                }
            }
        } else {
            return back()->with('error', 'You are a robot');
        }
    }
    private function getCaptcha($secretKey)
    {
        $secret_key = env('SECRET_KEY');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response={$secretKey}");
        $result = json_decode($response);
        return $result;
    }

    public function inquiry_now($uri = NULL){
        // dd('test',$uri);
        $trips = TripModel::all();
        $activity = ActivityModel::where('activity_parent', 'trekking')->get();
        // $terms = PostModel::where('id', '134')->first();
        $data = PostTypeModel::where('id', '24')->first();
        $sidebar = PostModel::where(['post_type'=>$data->id])->get();
        if(!empty($uri)){
            $trips = TripModel::where('uri', $uri)->first();
            $activity = $trips->activities->first();
        }
        return view('themes.default.inquiry',compact('trips','activity','data','sidebar','uri'));
    }
    public function post_inquiry(Request $request)
    {
        // dd('test',$request->all());
        $setting = SettingModel::where('id', 1)->first();
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if ($result->success == true && $result->score > 0.6) {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(),[
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'contact' => 'required|string|max:20',
                    'country' => 'required|string|max:100',
                    'activity_type' => 'nullable',
                    'trip' => 'required|exists:cl_trip_details,id',
                    'message' => 'nullable|string'
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                // dd('test');
                $post = new TripInquiryModel();
                $post->trip_id = $request->trip;
                $post->title = $request->activity_type;
                $post->name = $request->name;
                $post->email = $request->email;
                $post->number = $request->contact;
                $post->country = $request->country;
                $post->message= $request->message;
                if ($post->save()) {
                    return new AdminBookingMail();
                    // Mail::send(new AdminInquiryMail());
                    // $name = $request->name;
                    // $message = "<p>Thanks for your enquiry. One of our team will be in touch soon to discuss your interests and how we can help with your plans.</p>";

                    // return view('themes.default.booking-success', compact('name', 'message'));
                }
            }
        } else {
            return back()->with('error', 'You are a robot');
        }
    }

    public function subscribe(Request $request)
    {
        // $g_recaptcha_response = $request->input('g_recaptcha_response');
        // $result = $this->getCaptcha($g_recaptcha_response);
        // dd($result);
        // if($result->success == true && $result->score > 0.3){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ]);
        }

        // $check=Subscriber::where('email',$request->email)->first();
        // dd($check);
        // if ($check->verified==1)
        // {
        //     return back()->with('error', 'You have already subscribed');

        // }

        $user = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email,
            'verified' => 0,
        ]);
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => Str::random(20)
        ]);

        if ($user && $verifyUser) {
            Newsletter::subscribe($request->email, ['FNAME' => $request->name]);
            // Mail::send(new VerifyMail($verifyUser->token, $user->id, $user->name));
            return response()->json(['message' => 'Please verify your email to complete registration process', 'status' => 'success']);
        }

        // }else{
        //     return back()->with('message','You are a robot');
        // }
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->users;
            if (!$user->verified) {
                $verifyUser->users->verified = 1;
                $verifyUser->users->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect()->intended(url('/'))->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect()->intended(url('/'))->with('success', $status);
    }

    public function contact_us(Request $request)  
    {
        // $g_recaptcha_response = $request->input('g_recaptcha_response');
        // $result = $this->getCaptcha($g_recaptcha_response);
        // if ($result->success == true && $result->score > 0.6) {
            $request->validate([
                'full_name' => 'required',
                'number' => 'required',
                'email' => 'required|email',
            ]);

            if ($request->isMethod('post')) {
                $setting = SettingModel::where('id', 1)->first();
                $create = Contact::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'number' => $request->number,
                    'message' => $request->comments,
                    'country' => $request->country,
                    'trip'=>$request->trip
                ]);
                // Mail::send(new \App\Mail\AdminContactMail($request->email));
                $name = $request->full_name;
                $message = "<p>Thanks for contacting us. One of our team will be in touch with you soon.</p>";
                return view('themes.default.booking-success', compact('message', 'name'));
            }
        // } else {
        //     return back()->with('error', 'You are a robot');
        // }
    }

    public function verifyContact($token)
    {
        $verifyUser = VerifyContact::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->users;
            if (!$user->verified) {
                $verifyUser->users->verified = 1;
                $verifyUser->users->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect()->intended(url('/'))->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect()->intended(url('/'))->with('success', $status);
    }

    public function store_tailormade(Request $request)
    {
        $setting = SettingModel::where('id', 1)->first();
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if ($result->success == true && $result->score > 0.6) {
            if ($request->isMethod('post')) {
                $request->validate([
                    // 'trip_id'=>'required',
                    'full_name' => 'required',
                    'email' => 'required|email',
                    'country' => 'required',
                ]);

                $tailor  = new TripTailormadeModel;
                $tailor->title = $request->title;
                $tailor->full_name = $request->full_name;
                $tailor->email = $request->email;
                $tailor->contact = $request->contact;
                $tailor->message = $request->message;
                $tailor->country = $request->country;
                $tailor->trip_id = $request->trip_id;
                $tailor->num_ppl = $request->num_ppl;
                $tailor->duration = $request->duration;
                $tailor->start_date = $request->start_date;
                if ($tailor->save()) {
                    // return new \App\Mail\AdminTailorMadeMail($request->email);
                    Mail::send(new AdminTailorMadeMail($setting->email_secondary));
                    // Mail::send(new \App\Mail\Contact($request->email));
                    $name = $request->full_name;
                    $message = "<p>Thanks for your enquiry. One of our team will be in touch soon to discuss your interests and how we can help with your plans.</p>";

                    return view('themes.default.booking-success', compact('name', 'message'));
                }
            }
        } else {
            return back()->with('message', 'You are a robot');
        }
    }

    public function store_filmmaking(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'trip_id' => 'required',
                'full_name' => 'required',
                'email' => 'required|email',
                'contact' => 'required',
                'country' => 'required',
                'h-captcha-response' => 'required|HCaptcha',

            ]);
            $film = new TripFilmMakingModel();
            $film->title = $request->title;
            $film->full_name = $request->full_name;
            $film->email = $request->email;
            $film->contact = $request->contact;
            $film->message = $request->message;
            $film->country = $request->country;
            $film->trip_id = $request->trip_id;
            $film->num_ppl = $request->num_ppl;
            $film->duration = $request->duration;
            $film->start_date = $request->start_date;
            if ($film->save()) {
                // return new \App\Mail\AdminFilmMakingMail($request->email);
                // Mail::send(new \App\Mail\Contact($request->email));
                return back()->with('message', 'Form submitted successfully');
            }
        }
    }

    public function show_search_form(Request $request)
    {
        if ($request->isMethod('get')) {
            if ($request->days != NULL) {
                $trips = ActivityModel::find($request->activity)->trips()
                    ->where('duration', '<=', $request->days)
                    ->get();
                return  view('themes.default.search-trip', compact('trips'));
            } else {
                return back()->with('error', 'Please enter the number of days.');
            }
        }
    }

    public function search_all(Request $request)
    {
        $content_search = $request->search;
        // Search Trips 
        // dd($content_search);
        $trip = TripModel::where('status', '1')->where('trip_title', 'like', '%' . trim($content_search) . '%')->orWhere('uri', 'like', '%' . trim($content_search) . '%')->paginate(8);

        //Search Category 
        $category = ActivityModel::where('title', 'like', '%' . trim($content_search) . '%')->orWhere('uri', 'like', '%' . trim($content_search) . '%')->get();

        //Search Post(Company)
        // $post = PostModel::where('status', '1')->where('post_title', 'like', '%' . trim($content_search) . '%')->orWhere('uri', 'like', '%' . trim($content_search) . '%')->get();

        //Search Teams
        $team = TeamModel::where('status', '1')->where('name', 'like', '%' . trim($content_search) . '%')->orWhere('uri', 'like', '%' . trim($content_search) . '%')->orWhere('position', 'like', '%' . trim($content_search) . '%')->get();

        //Search Region
        $region = RegionModel::where('status', '1')->where('title', 'like', '%' . trim($content_search) . '%')->orWhere('uri', 'like', '%' . trim($content_search) . '%')->orWhere('sub_title', 'like', '%' . trim($content_search) . '%')->get();

        //Search Destination
        $destination = DestinationModel::where('status', '1')->where('title', 'like', '%' . trim($content_search) . '%')->orWhere('uri', 'like', '%' . trim($content_search) . '%')->get();
        // dd($content_search,$request);
        return view('themes.default.search', compact('trip', 'category', 'team', 'region', 'destination','content_search'));
    }

    public function booking_now(Request $request)
    {
        $setting = SettingModel::where('id', 1)->first();
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if ($result->success == true) {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(),[
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'contact' => 'required|string|max:20',
                    'country' => 'required|string|max:100',
                    'activity_type' => 'nullable',
                    'trip' => 'required|exists:cl_trip_details,id', 
                    'start_date' => 'required|date|after_or_equal:today',
                    'end_date' => 'required|date|after_or_equal:today',
                    'peoples' => 'required|integer|min:1|max:100',
                    'requirement' => 'nullable|string'
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                $tripData = TripModel::where('id', $request->trip)->first();
                if (!$tripData) {
                    return back()->withErrors('Trip not found!')->withInput();
                }
                if($request->has('custom') && !empty($request->custom)){
                    $create = CustomizeModel::create([
                        'trip_id' => $request->trip,
                        'title' => $tripData->trip_title,
                        'name' => $request->name,
                        'no_of_people' => $request->peoples,
                        'country' => $request->country,
                        'email' => $request->email,
                        'phone' => $request->contact,
                        'trip_start_date' => $request->start_date,
                        'trip_end_date' => $request->end_date,
                        'comments' => $request->requirement,
                    ]);
                }else{
                    $create = BookingModel::create([
                        'trip_id' => $request->trip,
                        'title' => $tripData->trip_title,
                        'full_name' => $request->name,
                        'total_travellers' => $request->peoples,
                        'country' => $request->country,
                        'email' => $request->email,
                        'phone' => $request->contact,
                        'trip_start_date' => $request->start_date,
                        'trip_end_date' => $request->end_date,
                        'hear' => $request->requirement,
                    ]);
                }
                if($create){
                    return new AdminBookingMail();
                    // Mail::send(new AdminBookingMail());
                    // Mail::send(new BookTrip($request->email));
                    $name = $request->name;
                    $message = "<p>Thanks for your booking request. One of our team will be in touch soon to confirm details.</p>
                    <p>We’re looking forward to welcoming you to Adventure Sherpa Tracks!</p>";
                    return view('themes.default.booking-success', compact('name', 'message'));
                }
            }
        } else {
            return back()->withErrors('error', 'You are a robot')->withInput();
        }

    }
    public function enroll_now(Request $request)
    {
        // dd($request->all());
        $setting = SettingModel::where('id', 1)->first();
        $g_recaptcha_response = $request->input('g_recaptcha_response');
        $result = $this->getCaptcha($g_recaptcha_response);
        if ($result->success == true) {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(),[
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'contact' => 'required|string|max:50',
                    'country' => 'required|string|max:100',
                    'training_title' => 'required|string|max:255',
                    'price' => 'required|numeric|min:0',
                    'duration' => 'required|integer|min:1',
                    'start_date' => 'nullable|date|after_or_equal:today',
                    'message' => 'nullable|string'
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                // return new EnrollmentMail();
                // dd($tripData);
                $create = EnrollmentModel::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'country' => $request->country,
                    'training_title' => $request->training_title,
                    'price' => $request->price,
                    'duration' => $request->duration,
                    'start_date' => $request->start_date,
                    'message' => $request->message,
                ]);
                if($create){
                    return new EnrollmentMail();
                    // Mail::send(new EnrollmentMail($setting->email_secondary));
                    // Mail::send(new BookTrip($request->email));
                    // $name = $request->full_name;
                    // $message = "<p>Thanks for your booking request. One of our team will be in touch soon to confirm details.</p>
                    // <p>We’re looking forward to welcoming you to Adventure Sherpa Tracks!</p>";
                    // return view('themes.default.booking-success', compact('name', 'message'));
                }
            }
        } else {
            return back()->withErrors('error', 'You are a robot')->withInput();
        }

    }
    public function book_now()
    {
        $booking = NULL;
        $start_date = NULL;
        $trips = TripModel::all();
        $activity = ActivityModel::where('activity_parent', 'trekking')->get();
        $terms = PostModel::where('id', '134')->first();
        $data = PostTypeModel::where('id', '24')->first();
        $sidebar = PostModel::where(['post_type'=>$data->id])->get();
        // dd($activity,$trips);
        return view('themes.default.booking', compact('booking', 'terms', 'trips', 'activity','start_date','sidebar'));
    }

    public function getTrips(Request $request)
    {
        $activity_ids = ActivityModel::where(['activity_parent'=>$request->activity_type])->pluck('id');
        $trips = TripModel::whereHas('activities', function ($query) use ($activity_ids) {
            $query->whereIn('activity_id', $activity_ids);
        })->get();
        // dd($request->all(),$activity_ids,$trips);

        return response()->json($trips);
    }

    public function showbooking(Request $request,$uri)
    {
        $start_date = $request->start_date ? $request->start_date: null;
        $end_date = $request->end_date ? $request->end_date : null;
        $booking = TripModel::where('uri', $uri)->first();
        $trips = TripModel::all();
        $activity = $booking->activities->first();
        $terms = PostModel::where('id', '134')->first();
        $data = PostTypeModel::where('id', '24')->first();
        $sidebar = PostModel::where(['post_type'=>$data->id])->get();
        // dd($start_date,$booking,$trips,$activity,$terms);
        return view('themes.default.booking', compact('booking', 'terms', 'trips', 'activity', 'start_date', 'end_date','sidebar'));
    }


    public function showbookingsuccess()
    {
        return view('themes.default.booking-success');
    }

    public function customize_trip(Request $request)
    {
        if($request->isMethod('get'))
        {
        $uri=$request->uri;
        $data= TripModel::where('uri',$uri)->first();
        return view('themes.default.customize-trip',compact('data'));
        }

        if($request->isMethod('post'))
        {
            $setting = SettingModel::where('id', 1)->first();
            $g_recaptcha_response = $request->input('g_recaptcha_response');
            $result = $this->getCaptcha($g_recaptcha_response);
            if ($result->success == true) {
                if ($request->isMethod('post')) {
                    $request->validate([
                        'name' => 'required',
                        'phone' => 'required',
                        'email' => 'required',
                        'country' => 'required',
                        'trip_start_date' => 'required',
                    ]);
                    $data = $request->all();
                    $result = CustomizeModel::create($data);
                    if ($result) {
                        Mail::send(new AdminCustomizeTrip());
                        Mail::send(new SendInquiry());
                        $name = $request->name;
                        $message = "<p>Thanks for your inquiry. One of our team will be in touch soon to discuss your interests and how we can help with your plans.</p>";
                        return view('themes.default.booking-success', compact('name', 'message'));
                    }
                }
            } else {
                return back()->with('error', 'You are a robot');
            }
        }
     
    }

    public function expedition(Request $request)
    {
        $item= ActivityModel::where('uri',$request->uri)->first();
        $data = ActivityModel::find($item->id)->trips()->where('status','1')->orderBy('ordering','asc')->get(); 
        return view('themes.default.expedition', compact('data','item'));
    }
    public function package($uri)
    {
        $item= ActivityModel::where('uri',$uri)->first();
        $data = ActivityModel::find($item->id)->trips()->where('status','1')->orderBy('ordering','asc')->paginate(4);
        // dd($uri,$item,$data);
        return view('themes.default.package', compact('data','item'));
    }
    public function packageDetail($uri)
    {
        $item = TripModel::where('uri',$uri)->first();
        if ($item->id) {
            $itinerary = $item->itineraries()->orderBy('ordering', 'asc')->get();
        }
        $data = $item->activities()->first(); 
        $setting = SettingModel::where('id',1)->first();
        // dd($uri,$item,$data);
        return view('themes.default.packagedetail', compact('item','data','itinerary','setting'));
    }

    public function tour()
    {
        $data = DestinationModel::where('status', '1')->get();
        $destination= PostTypeModel::where('id', '29')->first();
        return view('themes.default.tour', compact('data','destination'));
    }

    public function trekking(Request $request)  
    {
        $item= ActivityModel::where('uri',$request->uri)->first();
        $data = ActivityModel::find($item->id)->trips()->where('status','1')->orderBy('ordering','asc')->paginate(8);
        return view('themes.default.trekking', compact('data','item'));
    }

    public function activitylist()
    {
        $data = ActivityModel::where('activity_parent','activity')->orderBy('ordering','asc')->paginate(6);
        $trips = $data->flatMap(function ($activity){
            return $activity->trips;
        })->take(3);
        // dd($data,$trips);
        return view('themes.default.activitylist', compact('data','trips'));
    }
    public function trekkinglist()
    {
        $parent = ActivityModel::where(['activity_parent' => 'activity', 'id' => '59'])->first();
        $data = ActivityModel::where('activity_parent','trekking')->orderBy('ordering','asc')->get();
        $trips = $data->flatMap(function ($activity){
            return $activity->trips;
        })->take(3);
        return view('themes.default.trekkinglist', compact('parent','data','trips'));
    }
    public function expeditionlist()
    {
        $parent = ActivityModel::where(['activity_parent' => 'activity', 'id' => '58'])->first();
        $data = ActivityModel::where('activity_parent','expedition')->orderBy('ordering','asc')->get();
        $trips = $data->flatMap(function ($activity){
            return $activity->trips;
        })->take(3);
        return view('themes.default.expeditionlist', compact('parent','data','trips'));
    }
    public function blog($uri)
    {
        $item = PostModel::where(['uri' => $uri])->first();
        $blog = PostTypeModel::where('id',$item->post_type)->first();
        $related = PostModel::where(['post_type' => $blog->id])->where('uri','!=',$uri)->take(6)->get();
        return view('themes.default.blogdetail', compact('blog','related','item'));
    }
    public function relatedlist($tripId)
    {
        $item = TripModel::where('uri', $tripId)->first();
        if ($item) {
            $parent = ActivityModel::whereHas('trips', function ($query) use ($item) {
                $query->where('trip_id', $item->id);
            })->first();
        }
        $similar_tripsId= $item->relatedtrips()->pluck('related_trip_id');

        if ($similar_tripsId->isNotEmpty()) {
            $data = TripModel::whereIn('id', $similar_tripsId)->paginate(8);
        }
        else{
            $data = TripModel::where('uri', '!=', $tripId)->orderBy('ordering', 'desc')->paginate(8, ['*'], 'page', null, 16);
        }
        return view('themes.default.relatedlist', compact('data','item','parent'));
    }

    public function teamlist($uri)
    {
        $team = TeamCategory::where(['uri' => $uri])->first(); 
        $team_cat = TeamCategory::where('team_parent','0')->get();
        $category2 = TeamCategory::where('team_parent','4')->orderBy('ordering', 'asc')->get();
        $first_team = TeamModel::where(['category' => $team->id, 'status' => '1'])->orderBy('ordering', 'asc')->get();

        if ($team->id == '1') {
            return view('themes.default.template-team', compact('team', 'team_cat', 'first_team'));
        } elseif ($team->id == '2') {
            return view('themes.default.team-international', compact('team', 'team_cat', 'first_team'));
        } else {
            return view('themes.default.team-staffs', compact('team', 'team_cat', 'first_team','category2'));
        }
    }

    public function teamdetail($uri)
    {
        $data = TeamModel::where(['uri'=> $uri])->orWhere('team_key', $uri)->first();
        
        $certificates = $data->certificates()->orderBy('ordering','asc')->get();
        $related=$relatedData = TeamModel::where('id', '!=', optional($data)->id)
        ->where('category', optional($data)->category)
        ->get();
        return view('themes.default.team-single', compact('data',  'certificates','related'));
    }
}
