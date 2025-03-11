<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function addbannerdetails(){ 
        $user = Auth::user();
        $banners = Banner::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.addbanner', ['userName' => $user->name,'userEmail' => $user->email], compact('banners',));
    }
    public function store(Request $request)
{
    $request->validate([
        'image' => 'nullable|image|max:2048',
        'heading' => 'nullable|string|max:255',
        'paragraph' => 'nullable',
        'sub_heading' => 'nullable',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        if ($file->isValid()) {
            $uniqueTimestamp = time();
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $imagePath = $fileName;
        }
    }

    $banner = Banner::create([
        'image' => $imagePath,
        'heading' => $request->heading,
        'paragraph' => $request->paragraph,
        'sub_heading' => $request->sub_heading,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Banner created successfully!',
        'banner' => $banner,
    ]);
}


public function show($id)
{
    $banner = Banner::find($id);

    if (!$banner) {
        return response()->json([
            'success' => false,
            'message' => 'Banner not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'banner' => $banner
    ]);
}


public function update(Request $request, $id)
{
    $banner = Banner::findOrFail($id);   

    $validator = Validator::make($request->all(), [
      'image' => 'nullable|image|max:1536', 
      'heading' => 'nullable|string|max:255',
      'paragraph' => 'nullable|string|max:255',
      'sub_heading' => 'nullable|string|max:255',

  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

     if ($request->hasFile('image')) {
        $file = $request->file('image');
        if ($file->isValid()) {
            $uniqueTimestamp = time();
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $imagePath = $fileName;

             $banner->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $banner->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
      $banner->paragraph = $request->paragraph;
    }

    if ($request->has('sub_heading')) {
        $banner->sub_heading = $request->sub_heading;
      }
    

     $banner->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'banner' => $banner
    ], 200);
}

public function deletebanner(Request $request)
{
    $banner = Banner::find($request->banner_id);

    if ($banner) {
        $banner->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}

}
