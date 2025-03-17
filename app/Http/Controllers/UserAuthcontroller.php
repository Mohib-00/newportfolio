<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Feature;
use App\Models\Highlight;
use App\Models\MainFaqs;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserAuthcontroller extends Controller
{
    public function register(Request $request) {
        try {
            
            $validateuser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|same:password',  
            ]);
    
            
            if ($validateuser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateuser->errors()  
                ], 401);  
            }
    
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),  
            ]);
    
            
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken  
            ], 200);
    
        } catch (\Throwable $th) {
           
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
 
     public function login(Request $request)
{
    try {
      
        $validateuser = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

       
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateuser->errors(),
            ], 422); 
        }

        
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'The credentials do not match our record.',
                'errors' => [
                    'password' => ['The password you entered is incorrect.']
                ],
            ], 401); 
        }
 
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'userType' => $user->userType,
        ], 200);

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}

public function logout() {
       
    auth()->user()->tokens()->delete();

    Session::flush(); 

    return response()->json([
        'status' => true,
        'message' => 'User logged out',
        'data' => [],
    ], 200);
}

     public function logoutuser() {
       
        auth()->user()->tokens()->delete();
 
        Session::flush(); 
    
        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => [],
        ], 200);
    }
    public function getUserData(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        $currentUser = Auth::user();  
    
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
                'currentUser' => $currentUser
            ]);
        }
    
        return response()->json(['success' => false, 'message' => 'User not found']);
    }
    
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->userType = $request->userType;
    
        $user->save();
    
        return response()->json(['message' => 'User updated successfully.']);
    }
    
    public function deleteUser(Request $request)
    {
        $user = User::find($request->user_id);
    
        if ($user) {
            $user->delete();
    
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        }
    
        return response()->json(['success' => false, 'message' => 'User not found']);
    }
 
     
     public function home(){ 
         $user = Auth::user();   
         $projects = Project::all();
         $banners = Banner::all();  
         $highlights = Highlight::all();  
         $features = Feature::all();
         $mainfaqses = MainFaqs::all();
         return view('userpages.home', compact('user','projects','banners','highlights','features','mainfaqses'));
     }
     public function account(){ 
        $user = Auth::user();  
        $highlights = Highlight::all(); 
        $features = Feature::all();      
        return view('userpages.accounting', compact('user','highlights','features'));
    }
 
     public function admin(){ 
        $user = Auth::user();         
       return view('adminpages.admin', ['userName' => $user->name,'userEmail' => $user->email]);
    }
    public function installation(){ 
        $user = Auth::user();         
        return view('userpages.installation', compact('user'));
    }
    public function manufacturing(){ 
        $user = Auth::user();         
        return view('userpages.manufacturing', compact('user'));
    }
    public function bookkeeping(){ 
        $user = Auth::user();         
        return view('userpages.bookkeeping', compact('user'));
    }
    public function expense(){ 
        $user = Auth::user();         
        return view('userpages.expense', compact('user'));
    }
    public function financial(){ 
        $user = Auth::user();         
        return view('userpages.financial', compact('user'));
    }
    public function invoicing(){ 
        $user = Auth::user();         
        return view('userpages.invoicing', compact('user'));
    }
    public function ocr(){ 
        $user = Auth::user();         
        return view('userpages.ocr', compact('user'));
    }
    public function blog(){ 
        $user = Auth::user();         
        return view('userpages.blog', compact('user'));
    }
    public function selectapp(){ 
        $user = Auth::user();         
        return view('userpages.selectapp', compact('user'));
    }
    public function growbusiness(){ 
        $user = Auth::user();         
        return view('userpages.growbusiness', compact('user'));
    }
    public function contact(){ 
        $user = Auth::user();         
        return view('userpages.contactpage', compact('user'));
    }

   public function  users(){ 
    $user = Auth::user();
    $users = User::orderBy('created_at', 'desc')
    ->get(); 
    return view('adminpages.users', ['userName' => $user->name,'userEmail' => $user->email],compact('users'));
  }

  public function changePassword(Request $request){
    $request->validate([
        'password' => 'required|confirmed',
    ]);
    $loggeduser = auth()->user();
    $loggeduser->password = Hash::make($request->password);
    $loggeduser->save();
    return response()->json([
        'message' => 'Password change succesfully',
        'status' => 'Success'   
    ], 200);
}
}
