<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::All();
        return view('admin.tag.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('admin.tag.create');
    }
    private function _validation(Request $request){
        $validation = $request->validate([
            'tag' => 'required|max:50',
        ],[   
            'tag.required' => 'Harus diisi!!!',
        ]);
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $tag = new Tag();
        $tag->tag = $request->tag;
        $tag->save();
        toastr()->success('Data has been created successfully!');

        return redirect()->route('tags');
    }

    public function edit($id)
    {
        $tag =  Tag::find($id);

        return view('admin.tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag =  Tag::find($id);
        
        $tag->tag = $request->tag;
        $tag->save();
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('tags');
    }

    public function delete($id)
    {
        $tags =  Tag::findOrfail($id);
        $tags->delete();
        toastr()->success('Data has been move to trash successfully!');
        return redirect()->back()->with('message','Data terhapus'); ///redirect()->route('categories')->with('message','data terhapus'); ;
    }
}
