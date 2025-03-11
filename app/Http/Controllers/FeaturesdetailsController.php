<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\FeatureBanners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class FeaturesdetailsController extends Controller
{
    public function detailsfeature($slug)
    {
        $user = Auth::check() ? Auth::user() : null;
        
        $feature = Feature::whereRaw("LOWER(REPLACE(heading, ' ', '-')) = ?", [strtolower($slug)])->first();
    
        if (!$feature) {
            return abort(404, 'Feature not found');
        }
    
        $featurebanners = FeatureBanners::where('slug', $feature->heading)->get();
    
        if ($featurebanners->isEmpty()) {
            return abort(404, 'No banners found for this feature');
        }
    
        return view('userpages.featuredetails', compact('feature', 'featurebanners'));
    }
    
    

}
