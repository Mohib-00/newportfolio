<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainSectionController extends Controller
{
    public function  mainsection(){ 
        $user = Auth::user();
        $mains = MainSection::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.main', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'mains'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'sub_heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
              ]);
      
              $imageName = null;
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                  }
              }
      
              $main = MainSection::create([
                  'image' => $imageName,
                  'heading' => $request->heading,
                  'sub_heading' => $request->sub_heading,
                  'paragraph' => $request->paragraph,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'main added successfully!',
                  'main' => $main
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $main = MainSection::findOrFail($id);
          return response()->json([
              'success' => true,
              'main' => $main
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $main = MainSection::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable|image',
                  'heading' => 'nullable|string',
                  'sub_heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
              ]);
      
              if ($validator->fails()) {
                  return response()->json(['errors' => $validator->errors()], 422);
              }
      
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                      $main->image = $imageName;
                  }
              }
      
              $main->heading = $request->heading ?? $main->heading;
              $main->sub_heading = $request->sub_heading ?? $main->sub_heading;
              $main->paragraph = $request->paragraph ?? $main->paragraph;
              $main->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'main updated successfully!',
                  'main' => $main
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletemain(Request $request)
{
    $main = MainSection::find($request->main_id);

    if ($main) {
        $main->delete();
        return response()->json(['success' => true, 'message' => 'main deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'main not found']);
}
}
