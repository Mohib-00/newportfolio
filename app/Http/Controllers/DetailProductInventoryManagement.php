<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\DetailProductInventory;

class DetailProductInventoryManagement extends Controller
{
    public function  inventorymanagement(){ 
        $user = Auth::user();
        $inventorys = DetailProductInventory::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.inventorymanagement', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'inventorys'));
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
      
              $inventory = DetailProductInventory::create([
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
                  'message' => 'inventory added successfully!',
                  'inventory' => $inventory
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $inventory = DetailProductInventory::findOrFail($id);
          return response()->json([
              'success' => true,
              'inventory' => $inventory
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $inventory = DetailProductInventory::findOrFail($id);
      
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
                      $inventory->image = $imageName;
                  }
              }
      
             
              if ($request->hasFile('sub_image')) {
                  $file = $request->file('sub_image');
                  if ($file->isValid()) {
                      $subImageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $subImageName);
                      $inventory->sub_image = $subImageName;
                  }
              }
      
              $inventory->heading = $request->heading ?? $inventory->heading;
              $inventory->sub_heading = $request->sub_heading ?? $inventory->sub_heading;
              $inventory->paragraph = $request->paragraph ?? $inventory->paragraph;
              $inventory->sub_paragraph = $request->sub_paragraph ?? $inventory->sub_paragraph;
              $inventory->slug = $request->slug ?? $inventory->slug;
      
              $inventory->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'inventory updated successfully!',
                  'inventory' => $inventory
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deleteinventory(Request $request)
{
    $inventory = DetailProductInventory::find($request->inventory_id);

    if ($inventory) {
        $inventory->delete();
        return response()->json(['success' => true, 'message' => 'inventory deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'inventory not found']);
}

}
