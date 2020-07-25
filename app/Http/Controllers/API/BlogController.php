<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\singlePost as singlePostResource;

use App\NewPost;

class BlogController extends Controller
{
    public function newPost(Request $request)
    {
        $validator=$request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:6'],
        ]);
        if ($request->hasFile('display')) {
            $fileWiithExt=$request->file('display')->getClientOriginalName();
      
            $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
            //get extension only
            $fileEx=$request->file('display')->getClientOriginalExtension();
            // file name to store
            $fileNametoStore=$fileName.'_'.time().'.'.$fileEx;
            // upload image
            $path=$request->file('display')->storeAs("public/uploads/images",$fileNametoStore);
            }
            else {
              $fileNametoStore='default.jpg';
            }
            //Create New Post
            // $tags='';
            // $tags_o=$request->input('tags');
            // $tags_o=json_decode($tags_o);
            // foreach ($tags_o as $tag) {
            //   $tags.=$tag->value.",";
            // }
            $post= new NewPost();
            $post->title=$request->input('title');
            // $post->slug=str_slug($request->input('title'),'-');
            // $post->user_id=$request->input('id');
            // $post->category=$request->input('category');
            $post->description=$request->input('description');
            $post->display=$fileNametoStore;
            $post->save();

             return response()->json(['success'=>'getting..'],200);
    
        

   }


   public function updatePost(Request $request)
   {
            
    $validator=$request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'min:6'],
    ]);


    
    if ($request->hasFile('display')) {
        $fileWiithExt=$request->file('display')->getClientOriginalName();
  
        $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
        //get extension only
        $fileEx=$request->file('display')->getClientOriginalExtension();
        // file name to store
        $fileNametoStore=$fileName.'_'.time().'.'.$fileEx;
        // upload image
        $path=$request->file('display')->storeAs("public/uploads/images",$fileNametoStore);
        }
        else {
          $fileNametoStore=$request->display;
        }
        //Create New Post
        // $tags='';
        // $tags_o=$request->input('tags');
        // $tags_o=json_decode($tags_o);
        // foreach ($tags_o as $tag) {
        //   $tags.=$tag->value.",";
        // }
  
 
        $post=NewPost::find($request->id);
        
        $post->title=$request->input('title');
        $post->description=$request->input('description');
        
        if ($request->hasFile('display')) {
          $post->display=$fileNametoStore;
        }

        $post->save();

         return response()->json(['success'=>'updated'],200);


  }



   public function allPost()
   {
    $post=NewPost::orderBy('created_at','desc')->get();
    return PostResource::collection($post);
   }



   public function deletePost(Request $request)
   {

    $validator=$request->validate([
        'ids' => ['required','array'],
    ]);
    NewPost::destroy($request->ids);
  
    return response()->json(['success'=>$request->ids],200);
   }

   public function getPost(Request $request,$id)
   {
    $post=NewPost::findOrFail($id);
    return response()->json(['data'=>[$post]], 200);
   }









   public function uploadFile(Request $request)
   {
    if ($request->hasFile('file')) {
      $fileWiithExt=$request->file('file')->getClientOriginalName();

      $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
      //get extension only
      $fileEx=$request->file('file')->getClientOriginalExtension();
      // file name to store
      $fileNametoStore=$fileName.'_'.time().'.'.$fileEx;
      // upload image
      $path=$request->file('file')->storeAs("public/uploads/images",$fileNametoStore);
      
    }

    $host= env('APP_URL',null).'/storage/uploads/images/'.$fileNametoStore;

       return response()->json(['filepath'=>$host],200);
   }

}