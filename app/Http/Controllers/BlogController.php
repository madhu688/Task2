<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\PseudoTypes\False_;

class BlogController extends Controller
{
    public function addPost()
    {
        return view('blog');    
    }

    public function savePost(Request $request)
    {
     
        $request ->validate([
                'title'=>'required|string',
                'description'=>'required',
                'author_name'=>'required',
        ]); 

         $postArray =  array(
         'title'=>$request->title,
         'description'=>$request->description,
         'author_name'=>$request->author_name
        );

        $blog = Blog::create($postArray);
  
         if(!is_null($blog))
         {
            return back()->with('success','Post has been saved Successfully');
         }      
         else
         {
            return back()->with('failed','Try again later');
         }    
    }

    public function getPost()
    {
        $blogs = Blog::orderBy('id','DESC')->get();
        return view('all-blog',compact('blogs'));
    }

    public function editPost($id)
    {
        $blog= Blog::find($id);
        return view('edit-blog',compact('blog'));
    }
    public function updatePost(Request $request)
    {
        $blog= Blog::find($request->id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->author_name = $request->author_name;
        $blog->save();
        return back()->with('blog_updated','Blog has been updated Sccessfully');

    }

    Public function deletePost($id)
    {
        Blog::where('id',$id)->delete();
        return back()->with('blog_deleted','Blog has been deleted Successfully'); 
    }

}