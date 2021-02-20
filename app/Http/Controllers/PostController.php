<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index',compact('posts'));
    }
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories','tags'));
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'title' => 'required|max:100|min:3',
            'category_id' => 'required',
            'content' => 'required'
            
        ],[
            'title.unique' => 'Kode sudah ada',
            'title.required' => 'Title harus diisi!!!',
            'title.min' => 'minimal 3 digit',
            'category_id.required' => 'Category harus di pilih!!!',
            'content.required' => 'Content harus di pilih!!!'
            //'content.min' => 'minimal 3 digit',
        ]);
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $post = new Post();
        $post->tittle = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        $image_path ="";
        if($request->hasFile('featured'))
        {
            $image = $request->featured;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/post/', $image_name);
            $image_path = 'uploads/post/'.$image_name;
        }

        $post->featured = $image_path;
        $post->save();

        $post->tags()->attach($request->tags);
        toastr()->success('Data has been created successfully!');
        return redirect()->route('post');

    }

    public function edit($id)
    {
        $post =  Post::find($id);
        $categories = Category ::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post','categories','tags'));
    }

    public function update(Request $request, $id)
    {
        $post =  Post::find($id);
        $post->tittle = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        if($request->hasFile('featured'))
        {
            if(file_exists($post->featured))
            {
                unlink($post->featured);
            }
            $image = $request->featured;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/post/', $image_name);
            $post->featured = 'uploads/post/'.$image_name;
        }
        $post->save();
        $post->tags()->sync($request->tags);
        toastr()->success('Data has been updated successfully!');

        return redirect()->route('post');
    }
    public function trash($id)
    {
        $post =  Post::findOrfail($id);
        // if(file_exists($post->featured))
        // {
        //     unlink($post->featured);
        // }
        $post->delete();
        toastr()->success('Data has been trashed successfully!');
        return redirect()->back()->with('message','Data terhapus');
    }
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.post.trashed',compact('posts'));
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();
        return redirect()->back();
    }
    public function delete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
       
        if(file_exists($post->featured))
        {
            unlink($post->featured);
        }

        $post->forceDelete();
        toastr()->success('Data has been cleaned successfully!');
        return redirect()->back();
    }
}
