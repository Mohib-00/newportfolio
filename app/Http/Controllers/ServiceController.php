<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Service;
use App\Models\ServiceBanner;
use App\Models\ServiceHighlight;
use App\Models\ServiceSection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
     public function openservices(){ 
        $user = Auth::user();
        $services = Service::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.services', ['userName' => $user->name,'userEmail' => $user->email], compact('services',));
    }


    public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'image' => 'nullable',               
                  'heading' => 'nullable|string',                 
                  'paragraph' => 'nullable|string',                 
                  'links' => 'nullable',
              ]);
      
              $imageName = null;
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                  }
              }
              $service = Service::create([
                  'image' => $imageName,
                  'heading' => $request->heading,
                  'sub_heading' => $request->sub_heading,
                  'paragraph' => $request->paragraph,
                  'sub_paragraph' => $request->sub_paragraph,
                  'links' => $request->links,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'service added successfully!',
                  'service' => $service
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $service = Service::findOrFail($id);
          return response()->json([
              'success' => true,
              'service' => $service
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $service = Service::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'image' => 'nullable',
                  'heading' => 'nullable|string',
                  'paragraph' => 'nullable|string',
                  'links' => 'nullable',
              ]);
      
              if ($validator->fails()) {
                  return response()->json(['errors' => $validator->errors()], 422);
              }
      
              if ($request->hasFile('image')) {
                  $file = $request->file('image');
                  if ($file->isValid()) {
                      $imageName = time() . '-' . $file->getClientOriginalName();
                      $file->move(public_path('images'), $imageName);
                      $service->image = $imageName;
                  }
              }
      
              $service->heading = $request->heading ?? $service->heading;
              $service->paragraph = $request->paragraph ?? $service->paragraph;
              $service->links = $request->links ?? $service->links;
      
              $service->save();
      
              return response()->json([
                  'success' => true,
                  'message' => 'service updated successfully!',
                  'service' => $service
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deleteservice(Request $request)
{
    $service = Service::find($request->service_id);

    if ($service) {
        $service->delete();
        return response()->json(['success' => true, 'message' => 'service deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'service not found']);
}


 public function detailsservice($slug)
    {
        $user = Auth::check() ? Auth::user() : null;
        $service = Service::whereRaw("LOWER(REPLACE(heading, ' ', '-')) = ?", [strtolower($slug)])->get();
        if ($service->isEmpty()) {
            return abort(404, 'service not found');
        }
        $servicebanners = ServiceBanner::whereIn('slug', $service->pluck('links'))->get();
        $servicehighlights = ServiceHighlight::whereIn('slug', $service->pluck('links'))->get();
        $servicesection3s = ServiceSection3::whereIn('slug', $service->pluck('links'))->get();
        /*$servicesection5s = servicesection5::whereIn('slug', $service->pluck('links'))->get();
    
        if ($servicebanners->isEmpty()) {
            return abort(404, 'No banners found for this service');
        }*/
        $services = Service::all();
        $features = Feature::all();
        
        return view('userpages.servicedetails', compact('service', 'servicebanners','servicehighlights','servicesection3s',/*'servicesection5s',*/'services','features'));
    }


}
