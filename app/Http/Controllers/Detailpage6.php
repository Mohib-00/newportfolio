<?php

namespace App\Http\Controllers;

use App\Models\Detail6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Detailpage6 extends Controller
{
    public function  detail6(){ 
        $user = Auth::user();
        $detail6s = Detail6::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.detail6', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'detail6s'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable|',
                  'sub_image' => 'nullable|',
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
      
              $detail6 = Detail6::create([
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
                  'message' => 'detail6 added successfully!',
                  'detail6' => $detail6
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $detail6 = Detail6::findOrFail($id);
          return response()->json([
              'success' => true,
              'detail6' => $detail6
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $detail6 = Detail6::findOrFail($id);
      
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
                      $detail6->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $detail6->sub_image = $subImageName;
                  }
              }
      
              $detail6->heading = $request->heading ?? $detail6->heading;
              $detail6->sub_heading = $request->sub_heading ?? $detail6->sub_heading;
              $detail6->paragraph = $request->paragraph ?? $detail6->paragraph;
              $detail6->sub_paragraph = $request->sub_paragraph ?? $detail6->sub_paragraph;
              $detail6->slug = $request->slug ?? $detail6->slug;
      
              $detail6->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'detail6 updated successfully!',
                  'detail6' => $detail6
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletedetail6(Request $request)
{
    $detail6 = Detail6::find($request->detail6_id);

    if ($detail6) {
        $detail6->delete();
        return response()->json(['success' => true, 'message' => 'detail6 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'detail6 not found']);
}
}
