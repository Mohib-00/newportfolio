<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeaturesController extends Controller
{
    public function  feature(){ 
        $user = Auth::user();
        $features = Feature::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.feature', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'features'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable|image',               
                  'heading' => 'nullable|string',                 
                  'paragraph' => 'nullable|string',                 
                  'links' => 'nullable',
              ]);
      
              $imageName = null;
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                  }
              }
              $feature = Feature::create([
                  'image' => $imageName,
                  'heading' => $request->heading,
                  'sub_heading' => $request->sub_heading,
                  'paragraph' => $request->paragraph,
                  'sub_paragraph' => $request->sub_paragraph,
                  'links' => $request->links,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'feature added successfully!',
                  'feature' => $feature
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $feature = Feature::findOrFail($id);
          return response()->json([
              'success' => true,
              'feature' => $feature
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $feature = Feature::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
                  'links' => 'nullable',
              ]);
      
              if ($validator->fails()) {
                  return response()->json(['errors' => $validator->errors()], 422);
              }
      
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                      $feature->image = $imageName;
                  }
              }
      
              $feature->heading = $request->heading ?? $feature->heading;
              $feature->paragraph = $request->paragraph ?? $feature->paragraph;
              $feature->links = $request->links ?? $feature->links;
      
              $feature->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'feature updated successfully!',
                  'feature' => $feature
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletefeature(Request $request)
{
    $feature = Feature::find($request->feature_id);

    if ($feature) {
        $feature->delete();
        return response()->json(['success' => true, 'message' => 'feature deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'feature not found']);
}
}
