<?php

namespace App\Http\Controllers;

use App\Models\Section7detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Detailssection7Controller extends Controller
{
    public function  detail7(){ 
        $user = Auth::user();
        $detail7s = Section7detail::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.detail7', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'detail7s'));
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
      
              $detail7 = Section7detail::create([
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
                  'message' => 'detail7 added successfully!',
                  'detail7' => $detail7
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $detail7 = Section7detail::findOrFail($id);
          return response()->json([
              'success' => true,
              'detail7' => $detail7
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $detail7 = Section7detail::findOrFail($id);
      
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
                      $detail7->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $detail7->sub_image = $subImageName;
                  }
              }
      
              $detail7->heading = $request->heading ?? $detail7->heading;
              $detail7->sub_heading = $request->sub_heading ?? $detail7->sub_heading;
              $detail7->paragraph = $request->paragraph ?? $detail7->paragraph;
              $detail7->sub_paragraph = $request->sub_paragraph ?? $detail7->sub_paragraph;
              $detail7->slug = $request->slug ?? $detail7->slug;
      
              $detail7->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'detail7 updated successfully!',
                  'detail7' => $detail7
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletedetail7(Request $request)
{
    $detail7 = Section7detail::find($request->detail7_id);

    if ($detail7) {
        $detail7->delete();
        return response()->json(['success' => true, 'message' => 'detail7 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'detail7 not found']);
}
}
