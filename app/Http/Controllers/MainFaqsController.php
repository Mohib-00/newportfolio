<?php

namespace App\Http\Controllers;

use App\Models\MainFaqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainFaqsController extends Controller
{
    public function  mainfaqs(){ 
        $user = Auth::user();
        $mainfaqses = MainFaqs::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.mainfaqs', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'mainfaqses'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'question' => 'nullable',
                  'answer' => 'nullable',
              ]);
              $faqs = MainFaqs::create([
                  'question' => $request->question,
                  'answer' => $request->answer,
              ]);
      
              return response()->json([
                  'success' => true,
                  'message' => 'faqs added successfully!',
                  'faqs' => $faqs
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
           public function show($id)
      {
          $faqs = MainFaqs::findOrFail($id);
          return response()->json([
              'success' => true,
              'faqs' => $faqs
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $faqs = MainFaqs::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'question' => 'nullable',
                  'answer' => 'nullable',
              ]);
      
              if ($validator->fails()) {
                  return response()->json(['errors' => $validator->errors()], 422);
              }
      
              $faqs->question = $request->question ?? $faqs->question;
              $faqs->answer = $request->answer ?? $faqs->answer;
              $faqs->save();
              return response()->json([
                  'success' => true,
                  'message' => 'faqs updated successfully!',
                  'faqs' => $faqs
              ], 200);
          } catch (\Exception $e) {
              return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
          }
      }
      
public function deletemainfaqs(Request $request)
{
    $faqs = MainFaqs::find($request->faqs_id);

    if ($faqs) {
        $faqs->delete();
        return response()->json(['success' => true, 'message' => 'faqs deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'faqs not found']);
}
}
