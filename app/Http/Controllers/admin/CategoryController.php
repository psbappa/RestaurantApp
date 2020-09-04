<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Category;
use Illuminate\Support\Facades\File;
use Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $category_list = Category::get()->toArray();
        return view('admin.category.category',compact('category_list'));
        // return view('admin.category.category');
    }

    public function addCategory() {
        return view('admin.category.add_category_form');
    }

    public function saveCategory(Request $request,$id = null) {

        if($id == null) {
            $this->validate($request,[
                'title'=>'required',
                // 'descripion'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                $image_name = time().'_'.rand(1000,10000).'_'. preg_replace('/[^a-zA-Z0-9_.]/', '', $files) .'.'.$files->getClientOriginalExtension();
    
                $category = new Category();
                $category->title = $request['title'];
                $category->descripion = $request['descripion'];
                $category->image = $image_name;
                
                $destinationPath = public_path('/images/category');
                $image_upload = $files->move($destinationPath, $image_name);
                if ($image_upload) {
                    // Category::create($category);
                    // return response()->json(['success'=>'done']);
                    $category->save();
                    return back()->with('success','You have successfully upload image.');
                } else {
                    return Redirect::back()->withInput(Input::all());
                }
            }
        } 
        else {
            $category = Category::find($id);
            $existingImage = $category['image'];

            $this->validate($request,[
                                'title'=>'required',
                                'description'=>'required'
                            ]);
            
            if ($request->hasFile('image')) {
                if(File::exists(public_path('images/category/'.$existingImage))) {
                    File::delete(public_path('images/category/'.$existingImage));
                }

                $files = $request->file('image');
                $image_name = time().'_'.rand(1000,10000).'_'. preg_replace('/[^a-zA-Z0-9_.]/', '', $files) .'.'.$files->getClientOriginalExtension();
                $data = [
                    'image'     => $image_name
                ];
                $destinationPath = public_path('/images/category');
                $image_upload = $files->move($destinationPath, $image_name);
                $update_category = Category::where('id',$request['id'])->update($data);
            }

            $data = [
                'title'         => $request['title'],
                'descripion'    => $request['description']
            ];

            $update_category = Category::where('id',$request['id'])->update($data);
            if($update_category) {
                return redirect()->route('category')->withSuccess('Category Updated Successfully!');
            } else {
                return Redirect::back()->withInput($request->all());
            }
        }
        
    }

    public function edit_category_form($id) {
        $category_data = Category::where('id',$id)->first();
        return view('admin/category/edit_category_form',compact('category_data'));
    }

    public function deleteCategory(Request $request, $id) {
        $category = Category::find($id);
        $existingImage = $category['image'];
        $delete_category = Category::where('id',$id)->delete();
        // dd($existingImage);
        if($delete_category) {
            if(File::exists(public_path('images/category/'.$existingImage))) {
                File::delete(public_path('images/category/'.$existingImage));
            }
        return redirect()->route('category')->withSuccess('Category deleted Successfully!');
        }
    }
}
