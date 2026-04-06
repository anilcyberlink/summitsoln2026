<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\ActivityBannerModel;
use Illuminate\Support\Str;
use Image;

class ActivityBannerController extends Controller
{
    public function index($id)
    {
        $data = ActivityModel::find($id);
        // dd($data);
        $image = ActivityBannerModel::where('activity_id', $data->id)->get();
        // dd($image);
        return view('admin.activities.activity-banner', compact('data', 'image'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $banner = new ActivityBannerModel();
        $banner->activity_id = $request->activity_id;

        if ($request->hasfile('picture')) {
            $image = $request->file('picture');

            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Str::slug($filename) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())
                ->encode('webp', 90)
                ->save(public_path('uploads/original/') . $name);

            $banner->picture = $name;
        }
        $banner->save();
        return back()->with('success', 'Banner added successfully');
    }
    public function delete_banner_activity($id)
    {
        // dd('here');
        $data = ActivityBannerModel::find($id);
        if ($data->picture) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->picture);
            }
        }
        $data->picture = null;
        $data->delete();
        return response('Delete Successful.');
    }
}
