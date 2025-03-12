<?php

namespace App\Http\Controllers;

use App\Models\FeatureBanners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeaturebannerController extends Controller
{
    public function  featurebanner(){ 
        $user = Auth::user();
        $featurebanners = FeatureBanners::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.featurebanner', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'featurebanners'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'sub_heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
                  'slug' => 'nullable|string',
              ]);
      
              $imageName = null;
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                  }
              }
      
              $featurebanner = FeatureBanners::create([
                  'image' => $imageName,
                  'heading' => $request->heading,
                  'sub_heading' => $request->sub_heading,
                  'paragraph' => $request->paragraph,
                  'slug' => $request->slug,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'featurebanner added successfully!',
                  'featurebanner' => $featurebanner
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $featurebanner = FeatureBanners::findOrFail($id);
          return response()->json([
              'success' => true,
              'featurebanner' => $featurebanner
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $featurebanner = FeatureBanners::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'sub_heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
                  'slug' => 'nullable|string',
              ]);
      
              if ($validator->fails()) {
                  return response()->json(['errors' => $validator->errors()], 422);
              }
      
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                      $featurebanner->image = $imageName;
                  }
              }
      
              $featurebanner->heading = $request->heading ?? $featurebanner->heading;
              $featurebanner->sub_heading = $request->sub_heading ?? $featurebanner->sub_heading;
              $featurebanner->paragraph = $request->paragraph ?? $featurebanner->paragraph;
              $featurebanner->slug = $request->slug ?? $featurebanner->slug;
      
              $featurebanner->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'featurebanner updated successfully!',
                  'featurebanner' => $featurebanner
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletefeaturebanner(Request $request)
{
    $featurebanner = FeatureBanners::find($request->featurebanner_id);

    if ($featurebanner) {
        $featurebanner->delete();
        return response()->json(['success' => true, 'message' => 'featurebanner deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'featurebanner not found']);
}
}
