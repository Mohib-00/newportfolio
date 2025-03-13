<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
public function adminprofile()
{
$user = Auth::user();   
 return view('adminpages.profile', ['userName' => $user->name,'userEmail' => $user->email,'userImage' => $user->image]);
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:users,email,' . $user->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($user->image && File::exists(public_path('images/' . $user->image))) {
            File::delete(public_path('images/' . $user->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
    }

    if ($request->filled('name')) {
        $user->name = $request->name;
    }
    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully!',
        'image' => $user->image ? asset('images/' . $user->image) : null, 
        'name' => $user->name,
        'email' => $user->email
    ]);
}

public function  websitesettings(){ 
    $user = Auth::user();
    $settings = Setting::all();  
    return view('adminpages.settings', ['userName' => $user->name,'userEmail' => $user->email], compact('settings',));
}
public function store(Request $request)
{
$request->validate([
    'logo' => 'nullable|image|max:2048',
    'name' => 'nullable|',
    'email' => 'nullable|email',
    'address' => 'nullable',
    'phone' => 'nullable|',
    'paragraph' => 'nullable',
    'facebook_link' => 'nullable',
    'twitter_link' => 'nullable',
]);

$setting = Setting::first(); 

$imagePath = $setting->logo ?? null;


if ($request->hasFile('logo')) {
    $file = $request->file('logo');
    if ($file->isValid()) {
        $uniqueTimestamp = time();
        $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        $imagePath = $fileName;
    }
}

$setting = Setting::updateOrCreate(
    ['id' => $setting ? $setting->id : null],
    [
        'logo' => $imagePath,
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'phone' => $request->phone,
        'paragraph' => $request->paragraph,
        'facebook_link' => $request->facebook_link,
        'twitter_link' => $request->twitter_link,
    ]
);

 return response()->json([
    'success' => true,
    'message' => $setting ? 'Settings updated successfully!' : 'Settings created successfully!',
    'setting' => $setting,  
]);
}

public function show($id) {
$setting = Setting::find($id);
return response()->json($setting);
}

public function update(Request $request, $id)
{
$setting = Setting::find($id);

if (!$setting) {
    return response()->json(['message' => 'Setting not found'], 404);
}

if ($request->hasFile('logo')) {
    $file = $request->file('logo');

    if ($file->isValid()) {
        $uniqueTimestamp = time();
        $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        $setting->logo = $fileName;
    }
}

 $setting->fill($request->only([
    'name', 
    'email', 
    'address', 
    'phone', 
    'paragraph',
    'facebook_link',
    'twitter_link'
]));

$setting->save();

return response()->json([
    'message' => 'Setting updated successfully',
    'setting' => $setting
]);
}

}
