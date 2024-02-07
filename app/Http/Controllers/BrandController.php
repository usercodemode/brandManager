<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    // Store Posts
    public function store(Request $request){

        $validatedData = $request->validate([
           'brandName' => ['required'],
           'brandLogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brandSite' => ['required'],
        ]); 

        $post = Brand::create([
            'brandName' => $request->brandName,
            'brandLogo' => $this->storeImage($request),
            'brandSite' => $request->brandSite,
            'user_id' => Auth::id(),
        ]);

        return redirect('dashboard');
    }

    // Show Brands

    public function show(){
        $brands = Brand::all();
        
        return view('index', compact('brands'));
    }

    // Preview Posts

    public function userPosts(){
        
        if(!empty(Brand::all())){
            $brands = Brand::all()->sortByDesc('updated_at');
        }
        else {
            $brands = array();
        }

        return view('dashboard', compact('brands'));
    }

    // Show Edit Form

    public function edit($id){
        $brand = Brand::findOrFail($id);

        return view('edit', compact('brand'));
    }


    // Update Posts

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'brandName' => ['required'],
            'brandLogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brandSite' => ['required'],
        ]);

        $post = Brand::where("id", $id)->update([
            'brandName' => $request->brandName,
            'brandLogo' => (!isset($request->brandLogo)) ? Brand::find($id)->brandLogo : $this->storeImage($request),  
            'brandSite' => $request->brandSite, 
            'user_id' => Auth::id(),
        ]);

        return redirect('/dashboard');
    }


    // Delete Posts

    public function destroy($id){
        Brand::destroy($id);

        return redirect('/dashboard')->with('message', 'Item deleted successfully');


    }

    // Store Image
    
    public function storeImage($request){
      $newImageName = uniqid().'-'.$request->brandName.'.'.$request->file('brandLogo')->extension();
      $request->brandLogo->move(public_path('images'), $newImageName);

      return $newImageName;
    }

}
