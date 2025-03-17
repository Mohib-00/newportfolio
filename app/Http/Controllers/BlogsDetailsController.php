<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Models\BlogsDetail;
use App\Models\BlogsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsDetailsController extends Controller
{
    public function detailsblog($slug)
    {
        $user = Auth::check() ? Auth::user() : null;
        $blogs = blogs::whereRaw("LOWER(REPLACE(name, ' ', '-')) = ?", [strtolower($slug)])->get();
        if ($blogs->isEmpty()) {
            return abort(404, 'Feature not found');
        }
        $blogsdetails = BlogsDetail::whereIn('slug', $blogs->pluck('slug'))->get();
        $blogssections = BlogsSection::whereIn('slug', $blogs->pluck('slug'))->get();
        if ($blogsdetails->isEmpty()) {
            return abort(404, 'No banners found for this feature');
        }
        return view('userpages.blogsdetail', compact('blogs', 'blogsdetails','blogssections'));
    }
}
