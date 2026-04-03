<?php

namespace App\Http\ViewComposers;

use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use App\Models\Travels\RegionModel;
use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityModel;
use App\Models\Destinations\DestinationModel;
use App\Models\Posts\PostImageModel;
use App\Models\Posts\PostTypeModel;

class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
	  
		$view->with('expedition', ActivityModel::where('activity_parent','expedition')->orderBy('ordering','asc')->get());
		$view->with('trekking',ActivityModel::where('activity_parent','trekking')->orderBy('ordering','asc')->get());
		$view->with('destination',DestinationModel::where('status','1')->orderBy('ordering','asc')->get());
		$view->with('contact',PostModel::where(['id'=>131,'show_in_home'=>'1'])->first());
		$view->with('partners',PostImageModel::where('post_id', 151)->orderBy('id', 'desc')->take(5)->get());
		$view->with('associated',PostImageModel::where('post_id', 152)->orderBy('id', 'desc')->take(5)->get());
		$view->with('activity', ActivityModel::where('activity_parent','activity')->orderBy('ordering','asc')->get());
		$view->with('useful_info', PostModel::where(['post_type' => '24', 'status' => '1','post_parent' => '0'])->get());
	    $view->with('about', PostModel::where(['post_type' => '22', 'status' => '1','post_parent' => '0'])->get());
		$view->with('post_types', PostTypeModel::where(['status'=>'1','is_menu'=>'1'])->orderBy('ordering','asc')->get());
		$view->with('term_condition', PostModel::where(['id'=>'134'])->first());
		$view->with('privacy', PostModel::where(['id'=>'135'])->first());

	}	
}