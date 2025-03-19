<?php

namespace App\Http\Controllers;

use App\Models\AboutService;
use App\Models\Detail6;
use App\Models\Detailpagesection4;
use App\Models\DetailPagesection5;
use App\Models\DetailProductInventory;
use App\Models\faqs;
use App\Models\Feature;
use App\Models\Message;
use App\Models\ProductDetail;
use App\Models\ProductDetailsHighlight;
use App\Models\Project;
use App\Models\Section7detail;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductDetailscontroller extends Controller
{
    public function  addproductdetails(){ 
        $user = Auth::user();
        $products = ProductDetail::orderBy('created_at', 'desc')
        ->get();   
        return view('adminpages.productdetail', ['userName' => $user->name, 'userEmail' => $user->email],compact('user', 'products'));
      }


      public function store(Request $request)
      {
          $validator = Validator::make($request->all(), [
              'image' => 'nullable|image',
              'main_heading' => 'nullable',
              'sub_heading' => 'nullable',
              'paragraph' => 'nullable',
              'slug' => 'nullable',
          ]);
      
          if ($validator->fails()) {
              return response()->json(['errors' => $validator->errors()], 422);
          }
      
          $fileName = null;
      
          if ($request->hasFile('image')) {
              $file = $request->file('image');
              if ($file->isValid()) {
                  $uniqueTimestamp = time();
                  $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                  $file->move(public_path('images'), $fileName);
              }
          }
      
          $product = ProductDetail::create([
              'image' => $fileName, 
              'heading' => $request->heading,
              'sub_heading' => $request->sub_heading,
              'paragraph' => $request->paragraph,
              'slug' => $request->slug,
          ]);
      
          return response()->json([
              'success' => true,
              'message' => 'Product added successfully!',
              'product' => $product
          ], 200);
      }
      
      
      

      public function show($id)
      {
          $product = ProductDetail::findOrFail($id);
          return response()->json([
              'success' => true,
              'product' => $product
          ]);
      }

      public function update(Request $request, $id)
      {
          $product = ProductDetail::findOrFail($id);   
      
          $validator = Validator::make($request->all(), [
              'image' => 'nullable|image',
              'heading' => 'nullable',
              'sub_heading' => 'nullable',
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
                  $product->image = $fileName;
              }
          }
      
          $product->heading = $request->heading ?? $product->heading;
          $product->sub_heading = $request->sub_heading ?? $product->sub_heading;
          $product->paragraph = $request->paragraph ?? $product->paragraph;
          $product->slug = $request->slug ?? $product->slug;
      
          $product->save();
      
          return response()->json([
              'success' => true,
              'message' => 'Product updated successfully!',
              'product' => $product
          ], 200);
      }
      
      

public function deleteproduct(Request $request)
{
    $product = ProductDetail::find($request->product_id);

    if ($product) {
        $product->delete();
        return response()->json(['success' => true, 'message' => 'product deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'product not found']);
}

public function detailsPage($slug)
{
    $user = Auth::check() ? Auth::user() : null;
    $project = Project::whereRaw("LOWER(REPLACE(name, ' ', '-')) = ?", [Str::lower($slug)])->first();

    if (!$project) {
        return abort(404, 'Project not found');
    }
    $products = ProductDetail::where('slug', $project->links)->get();
    $productshighlights = ProductDetailsHighlight::where('slug', $project->links)->get();
    $inventorys = DetailProductInventory::where('slug', $project->links)->get();
    $section4s = Detailpagesection4::where('slug', $project->links)->get();
    $section5s = DetailPagesection5::where('slug', $project->links)->get();
    $section6s = Detail6::where('slug', $project->links)->get();
    $section7s = Section7detail::where('slug', $project->links)->get();
    $faqsess = faqs::where('slug', $project->links)->get();
    if ($products->isEmpty()) {
        return abort(404, 'No products found for this project');
    }
    $features = Feature::all();
    return view('userpages.productdetails', compact('project', 'products', 'user','productshighlights','inventorys','section4s','section5s','section6s','section7s','faqsess','features'));
}

}
