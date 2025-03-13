<?php

namespace App\Http\Controllers;

use App\Models\Featuresection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeatureSection3Controller extends Controller
{
    public function  featuresection3(){ 
        $user = Auth::user();
        $featuresection3s = Featuresection3::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.featuresection3', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'featuresection3s'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable|image',
                  'sub_image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'sub_heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
                  'sub_paragraph' => 'nullable|string',
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
      
              $subImageName = null;
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                  }
              }
      
              $featuresection3 = Featuresection3::create([
                  'image' => $imageName,
                  'sub_image' => $subImageName,
                  'heading' => $request->heading,
                  'sub_heading' => $request->sub_heading,
                  'paragraph' => $request->paragraph,
                  'sub_paragraph' => $request->sub_paragraph,
                  'slug' => $request->slug,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'featuresection3 added successfully!',
                  'featuresection3' => $featuresection3
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $featuresection3 = Featuresection3::findOrFail($id);
          return response()->json([
              'success' => true,
              'featuresection3' => $featuresection3
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $featuresection3 = Featuresection3::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable|image',
                  'hover_image' => 'nullable|image',
                  'sub_image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'sub_heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
                  'sub_paragraph' => 'nullable|string',
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
                      $featuresection3->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $featuresection3->sub_image = $subImageName;
                  }
              }
      
              $featuresection3->heading = $request->heading ?? $featuresection3->heading;
              $featuresection3->sub_heading = $request->sub_heading ?? $featuresection3->sub_heading;
              $featuresection3->paragraph = $request->paragraph ?? $featuresection3->paragraph;
              $featuresection3->sub_paragraph = $request->sub_paragraph ?? $featuresection3->sub_paragraph;
              $featuresection3->slug = $request->slug ?? $featuresection3->slug;
      
              $featuresection3->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'featuresection3 updated successfully!',
                  'featuresection3' => $featuresection3
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletefeaturesection3(Request $request)
{
    $featuresection3 = Featuresection3::find($request->featuresection3_id);

    if ($featuresection3) {
        $featuresection3->delete();
        return response()->json(['success' => true, 'message' => 'featuresection3 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'featuresection3 not found']);
}
}
