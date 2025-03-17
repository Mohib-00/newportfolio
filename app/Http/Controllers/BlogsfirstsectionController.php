<?php

namespace App\Http\Controllers;

use App\Models\BlogsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogsfirstsectionController extends Controller
{
    public function blogsdetails(){ 
        $user = Auth::user();
        $blogsdetails = BlogsDetail::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.detailsblog', ['userName' => $user->name,'userEmail' => $user->email], compact('blogsdetails',));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536',
                'name' => 'required',
                'heading' => 'required',
                'slug' => 'required', 
            ]);
    
            $blogData = [
                'name' => $request->name,
                'heading' => $request->heading,
            ];
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $blogData['image'] = $fileName;
                }
            }
    
            $blog = BlogsDetail::updateOrCreate(
                ['slug' => $request->slug], 
                $blogData
            );
    
            return response()->json(['success' => true, 'blog' => $blog]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    

public function show($id)
{
    $blog = BlogsDetail::find($id);

    if (!$blog) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'blog' => $blog
    ]);
}


public function update(Request $request, $id)
{
    $blog = BlogsDetail::findOrFail($id);   

    $validator = Validator::make($request->all(), [
      'image' => 'nullable|image|max:1536', 
      'name' => 'nullable|string|max:255',
      'heading' => 'nullable|string|max:255',
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

             $blog->image = $imagePath;
        }
    }
    if ($request->has('name')) {
        $blog->name = $request->name;
    }
    if ($request->has('heading')) {
        $blog->heading = $request->heading;
    }
    if ($request->has('slug')) {
        $blog->slug = $request->slug;
    }

    $blog->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'blog' => $blog
    ], 200);
}

public function deletedetailblogssssss(Request $request)
{
    $blog = BlogsDetail::find($request->blog_id);

    if ($blog) {
        $blog->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
