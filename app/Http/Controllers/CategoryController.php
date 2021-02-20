<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::All();
        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }
    private function _validation(Request $request){
        $validation = $request->validate([
            'name' => 'required|max:100|min:3',
            
        ],[
            'name.unique' => 'Kode sudah ada',
            'name.required' => 'Harus diisi!!!',
            'name.min' => 'minimal 3 digit',
        ]);
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        toastr()->success('Data has been created successfully!');

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category =  Category::find($id);

        return view('admin.category.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category =  Category::find($id);
        
        $category->name = $request->name;
        $category->save();
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('categories');
    }

    public function delete($id)
    {
        $category =  Category::findOrfail($id);
        $category->delete();
        toastr()->success('Data has been move to trash successfully!');
        return redirect()->back()->with('message','Data terhapus'); ///redirect()->route('categories')->with('message','data terhapus'); ;
    }
}
