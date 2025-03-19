<?php

namespace App\Http\Controllers;

use App\Models\DetailPagesection5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Section5DetailPage extends Controller
{
    public function  section5(){ 
        $user = Auth::user();
        $section5s = DetailPagesection5::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.section5', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'section5s'));
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
      
              $section5 = DetailPagesection5::create([
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
                  'message' => 'section5 added successfully!',
                  'section5' => $section5
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $section5 = DetailPagesection5::findOrFail($id);
          return response()->json([
              'success' => true,
              'section5' => $section5
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $section5 = DetailPagesection5::findOrFail($id);
      
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
                      $section5->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $section5->sub_image = $subImageName;
                  }
              }
      
              $section5->heading = $request->heading ?? $section5->heading;
              $section5->sub_heading = $request->sub_heading ?? $section5->sub_heading;
              $section5->paragraph = $request->paragraph ?? $section5->paragraph;
              $section5->sub_paragraph = $request->sub_paragraph ?? $section5->sub_paragraph;
              $section5->slug = $request->slug ?? $section5->slug;
      
              $section5->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'section5 updated successfully!',
                  'section5' => $section5
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletesection5(Request $request)
{
    $section5 = DetailPagesection5::find($request->section5_id);

    if ($section5) {
        $section5->delete();
        return response()->json(['success' => true, 'message' => 'section5 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'section5 not found']);
}
}
