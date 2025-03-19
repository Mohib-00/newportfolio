<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\FeatureBanners;
use App\Models\FeatureHighlight;
use App\Models\Featuresection3;
use App\Models\Featuresection5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class FeaturesdetailsController extends Controller
{
    public function detailsfeature($slug)
    {
        $user = Auth::check() ? Auth::user() : null;
        $feature = Feature::whereRaw("LOWER(REPLACE(heading, ' ', '-')) = ?", [strtolower($slug)])->get();
        if ($feature->isEmpty()) {
            return abort(404, 'Feature not found');
        }
        $featurebanners = FeatureBanners::whereIn('slug', $feature->pluck('links'))->get();
        $featurehighlights = FeatureHighlight::whereIn('slug', $feature->pluck('links'))->get();
        $featuresection3s = Featuresection3::whereIn('slug', $feature->pluck('links'))->get();
        $featuresection5s = Featuresection5::whereIn('slug', $feature->pluck('links'))->get();
    
        if ($featurebanners->isEmpty()) {
            return abort(404, 'No banners found for this feature');
        }
        $features = Feature::all();
        
        return view('userpages.featuredetails', compact('feature', 'featurebanners','featurehighlights','featuresection3s','featuresection5s','features'));
    }
    
}
