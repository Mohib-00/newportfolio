<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceSection3Controller extends Controller
{
    public function  servicesection3(){ 
        $user = Auth::user();
        $servicesection3s = ServiceSection3::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.servicesection3', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'servicesection3s'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable',
                  'sub_image' => 'nullable',
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
      
              $servicesection3 = ServiceSection3::create([
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
                  'message' => 'servicesection3 added successfully!',
                  'servicesection3' => $servicesection3
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $servicesection3 = ServiceSection3::findOrFail($id);
          return response()->json([
              'success' => true,
              'servicesection3' => $servicesection3
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $servicesection3 = ServiceSection3::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable',
                  'hover_image' => 'nullable|image',
                  'sub_image' => 'nullable',
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
                      $servicesection3->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $servicesection3->sub_image = $subImageName;
                  }
              }
      
              $servicesection3->heading = $request->heading ?? $servicesection3->heading;
              $servicesection3->sub_heading = $request->sub_heading ?? $servicesection3->sub_heading;
              $servicesection3->paragraph = $request->paragraph ?? $servicesection3->paragraph;
              $servicesection3->sub_paragraph = $request->sub_paragraph ?? $servicesection3->sub_paragraph;
              $servicesection3->slug = $request->slug ?? $servicesection3->slug;
      
              $servicesection3->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'servicesection3 updated successfully!',
                  'servicesection3' => $servicesection3
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deleteservicesection3(Request $request)
{
    $servicesection3 = ServiceSection3::find($request->servicesection3_id);

    if ($servicesection3) {
        $servicesection3->delete();
        return response()->json(['success' => true, 'message' => 'servicesection3 deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'servicesection3 not found']);
}
}
