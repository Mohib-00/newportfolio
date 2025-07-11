<?php

namespace App\Http\Controllers;

use App\Models\ServiceHighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceHighlightController extends Controller
{
     public function servicehighlight(){ 
        $user = Auth::user();
        $servicehighlights = ServiceHighlight::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.servicehighlight', ['userName' => $user->name,'userEmail' => $user->email], compact('servicehighlights',));
    }
    public function storeservicehighlight(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'required|image|max:1536', 
                'heading' => 'required',
                'paragraph' => 'required',
                'slug' => 'required',
            ]);
    
            $highlight = new ServiceHighlight();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $highlight->image = $fileName;
                }
            }
            $highlight->heading = $request->heading;
            $highlight->paragraph = $request->paragraph;
            $highlight->slug = $request->slug;
            $highlight->save();
            return response()->json(['success' => true, 'highlight' => $highlight]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function showservicehighlight($id)
{
    $highlight = ServiceHighlight::find($id);

    if (!$highlight) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'highlight' => $highlight
    ]);
}


public function updateservicehighlight(Request $request, $id)
{
    $highlight = ServiceHighlight::findOrFail($id);   

    $validator = Validator::make($request->all(), [
      'image' => 'nullable|image|max:1536', 
      'heading' => 'nullable|string|max:255',
      'paragraph' => 'nullable',
      'slug' => 'nullable',
  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

     if ($request->hasFile('image')) {
        $file = $request->file('image');
        if ($file->isValid()) {
            $uniqueTimestamp = time();
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $imagePath = $fileName;

             $highlight->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $highlight->heading = $request->heading;
    }
    if ($request->has('slug')) {
        $highlight->slug = $request->slug;
    }
    if ($request->has('paragraph')) {
        $highlight->paragraph = $request->paragraph;
    }
    

     $highlight->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'highlight' => $highlight
    ], 200);
}

public function deleteservicehighlight(Request $request)
{
    $highlight = ServiceHighlight::find($request->highlight_id);

    if ($highlight) {
        $highlight->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}

}
