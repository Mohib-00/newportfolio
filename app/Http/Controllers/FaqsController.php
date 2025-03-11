<?php

namespace App\Http\Controllers;

use App\Models\faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{
    public function  faqs(){ 
        $user = Auth::user();
        $faqses = faqs::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.faqs', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'faqses'));
      }

      public function store(Request $request)
      {
          try {
              $validatedData = $request->validate([
                  'question' => 'nullable',
                  'answer' => 'nullable',
                  'slug' => 'nullable|string',
              ]);
              $faqs = faqs::create([
                  'question' => $request->question,
                  'answer' => $request->answer,
                  'slug' => $request->slug,
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
          $faqs = faqs::findOrFail($id);
          return response()->json([
              'success' => true,
              'faqs' => $faqs
          ]);
      }

      public function update(Request $request, $id)
      {
          try {
              $faqs = faqs::findOrFail($id);
      
              $validator = Validator::make($request->all(), [
                  'question' => 'nullable',
                  'answer' => 'nullable',
                  'slug' => 'nullable',
              ]);
      
              if ($validator->fails()) {
                  return response()->json(['errors' => $validator->errors()], 422);
              }
      
              $faqs->question = $request->question ?? $faqs->question;
              $faqs->answer = $request->answer ?? $faqs->answer;
              $faqs->slug = $request->slug ?? $faqs->slug;
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
      
public function deletefaqs(Request $request)
{
    $faqs = faqs::find($request->faqs_id);

    if ($faqs) {
        $faqs->delete();
        return response()->json(['success' => true, 'message' => 'faqs deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'faqs not found']);
}
}
