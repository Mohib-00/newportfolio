<?php

namespace App\Http\Controllers;

use App\Models\BlogsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogsSections extends Controller
{
    public function blogssectionsssss(){ 
        $user = Auth::user();
        $sectionssssssss = BlogsSection::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.blogsectionsss', ['userName' => $user->name,'userEmail' => $user->email], compact('sectionssssssss',));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'heading' => 'nullable',
                'paragraph' => 'nullable',
                'slug' => 'nullable',
            ]);
    
            $blog = new BlogsSection();
            $blog->heading = $request->heading;
            $blog->paragraph = $request->paragraph;
            $blog->slug = $request->slug;
            $blog->save();
            return response()->json(['success' => true, 'blog' => $blog]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $blog = BlogsSection::find($id);

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
    $blog = BlogsSection::findOrFail($id);   

    $validator = Validator::make($request->all(), [
      'heading' => 'nullable|string|max:555',
      'paragraph' => 'nullable',
      'slug' => 'nullable',
  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    if ($request->has('heading')) {
        $blog->heading = $request->heading;
    }
    if ($request->has('slug')) {
        $blog->slug = $request->slug;
    }
    if ($request->has('paragraph')) {
        $blog->paragraph = $request->paragraph;
    }
    
    $blog->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'blog' => $blog
    ], 200);
}

public function deletesectionssssssssblog(Request $request)
{
    $blog = BlogsSection::find($request->blog_id);

    if ($blog) {
        $blog->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
