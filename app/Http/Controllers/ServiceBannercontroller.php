<?php

namespace App\Http\Controllers;

use App\Models\ServiceBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceBannercontroller extends Controller
{
     public function  servicebanner(){ 
        $user = Auth::user();
        $servicebanners = ServiceBanner::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.servicebanner', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'servicebanners'));
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
      
              $servicebanner = ServiceBanner::create([
                  'image' => $imageName,
                  'heading' => $request->heading,
                  'sub_heading' => $request->sub_heading,
                  'paragraph' => $request->paragraph,
                  'slug' => $request->slug,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'servicebanner added successfully!',
                  'servicebanner' => $servicebanner
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $servicebanner = ServiceBanner::findOrFail($id);
          return response()->json([
              'success' => true,
              'servicebanner' => $servicebanner
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $servicebanner = ServiceBanner::findOrFail($id);
      
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
                      $servicebanner->image = $imageName;
                  }
              }
      
              $servicebanner->heading = $request->heading ?? $servicebanner->heading;
              $servicebanner->sub_heading = $request->sub_heading ?? $servicebanner->sub_heading;
              $servicebanner->paragraph = $request->paragraph ?? $servicebanner->paragraph;
              $servicebanner->slug = $request->slug ?? $servicebanner->slug;
      
              $servicebanner->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'servicebanner updated successfully!',
                  'servicebanner' => $servicebanner
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deleteservicebanner(Request $request)
{
    $servicebanner = ServiceBanner::find($request->servicebanner_id);

    if ($servicebanner) {
        $servicebanner->delete();
        return response()->json(['success' => true, 'message' => 'servicebanner deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'servicebanner not found']);
}
}
