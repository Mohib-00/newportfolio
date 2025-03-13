<?php

namespace App\Http\Controllers;

use App\Models\Featuresection5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Featuresection5Controller extends Controller
{
    public function  featuresection5(){ 
        $user = Auth::user();
        $featuresection5s = Featuresection5::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.featuresection5', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'featuresection5s'));
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
      
              $featuresection5 = Featuresection5::create([
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
                  'message' => 'featuresection5 added successfully!',
                  'featuresection5' => $featuresection5
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $featuresection5 = Featuresection5::findOrFail($id);
          return response()->json([
              'success' => true,
              'featuresection5' => $featuresection5
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $featuresection5 = Featuresection5::findOrFail($id);
      
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
                      $featuresection5->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $featuresection5->sub_image = $subImageName;
                  }
              }
      
              $featuresection5->heading = $request->heading ?? $featuresection5->heading;
              $featuresection5->sub_heading = $request->sub_heading ?? $featuresection5->sub_heading;
              $featuresection5->paragraph = $request->paragraph ?? $featuresection5->paragraph;
              $featuresection5->sub_paragraph = $request->sub_paragraph ?? $featuresection5->sub_paragraph;
              $featuresection5->slug = $request->slug ?? $featuresection5->slug;
      
              $featuresection5->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'featuresection5 updated successfully!',
                  'featuresection5' => $featuresection5
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletefeaturesection5(Request $request)
{
    $featuresection5 = Featuresection5::find($request->featuresection5_id);

    if ($featuresection5) {
        $featuresection5->delete();
        return response()->json(['success' => true, 'message' => 'featuresection5 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'featuresection5 not found']);
}
}
