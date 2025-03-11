<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ProjectsController extends Controller
{
    public function  addprojects(){ 
        $user = Auth::user();
        $projects = Project::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.projects', ['userName' => $user->name,'userEmail' => $user->email],compact('projects','user'));
      }

      public function store(Request $request)
      {
          $validator = Validator::make($request->all(), [
               'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
               'name' => 'nullable',
               'links' => 'nullable',
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
            }
        }
      
          $project = Project::create([
              'image' => $fileName,
              'name' => $request->name,
              'links' => $request->links,
          ]);
      
          return response()->json([
              'success' => true,
              'message' => 'Project added successfully!',
              'project' => $project
          ], 200);
      }
      
      

      public function show($id)
      {
          $project = Project::findOrFail($id);
          return response()->json([
              'success' => true,
              'project' => $project
          ]);
      }

      public function update(Request $request, $id)
      {
          $project = project::findOrFail($id);   
      
          $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'nullable',
            'links' => 'nullable',
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
      
                   $project->image = $imagePath;
              }
          }
      
    
          if ($request->has('name')) {
              $project->name = $request->name;
          }
      
           if ($request->has('links')) {
              $project->links = $request->links;
          }
      
           $project->save();
      
          return response()->json([
              'success' => true,
              'message' => 'Project updated successfully!',
              'project' => $project
          ], 200);
      }
      

public function deleteproject(Request $request)
{
    $project = Project::find($request->project_id);

    if ($project) {
        $project->delete();
        return response()->json(['success' => true, 'message' => 'Project deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Project not found']);
}
       

}
