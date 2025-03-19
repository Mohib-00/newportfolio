<?php

namespace App\Http\Controllers;

use App\Models\Detailpagesection4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Section4DetailPage extends Controller
{
    public function  section4(){ 
        $user = Auth::user();
        $section4s = Detailpagesection4::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.section4', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'section4s'));
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
      
              $section4 = Detailpagesection4::create([
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
                  'message' => 'section4 added successfully!',
                  'section4' => $section4
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $section4 = Detailpagesection4::findOrFail($id);
          return response()->json([
              'success' => true,
              'section4' => $section4
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $section4 = Detailpagesection4::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable|image',
                  'hover_image' => 'nullable|image',
                  'sub_image' => 'nullable|',
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
                      $section4->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $section4->sub_image = $subImageName;
                  }
              }
      
              $section4->heading = $request->heading ?? $section4->heading;
              $section4->sub_heading = $request->sub_heading ?? $section4->sub_heading;
              $section4->paragraph = $request->paragraph ?? $section4->paragraph;
              $section4->sub_paragraph = $request->sub_paragraph ?? $section4->sub_paragraph;
              $section4->slug = $request->slug ?? $section4->slug;
      
              $section4->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'section4 updated successfully!',
                  'section4' => $section4
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletesection4(Request $request)
{
    $section4 = Detailpagesection4::find($request->section4_id);

    if ($section4) {
        $section4->delete();
        return response()->json(['success' => true, 'message' => 'section4 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'section4 not found']);
}
}
