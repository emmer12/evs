<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EvsResource;
use App\Http\Resources\Category as CategoryResource;

use App\EvsFeed;
use App\Category;

class EvsFeedController extends Controller
{


   public function getAll()
   {
    $post=EvsFeed::orderBy('created_at','desc')->get();
    return EvsResource::collection($post);
   }



   public function deletePost(Request $request)
   {

     $validator=$request->validate([
       'ids' => ['required','array'],
       ]);
       
       $post=EvsFeed::find($request->ids[0]);
       
       $cArr=explode('/',$post->cover);
       $cover=$cArr[count($cArr)-1];

       $vArr=explode('/',$post->video);
       $video=$vArr[count($vArr)-1];

       unlink(storage_path('app/public/uploads/images/'.$cover));
       unlink(storage_path('app/public/uploads/im/ages/'.$video));
            
       EvsFeed::destroy($request->ids);
    
    return response()->json(['success'=>$request->ids[0],'data'=>$cover],200);
   }

  //  public function getById(Request $request,$id)
  //  {
  //   $post=NewPost::findOrFail($id);
  //   return response()->json(['data'=>[$post]], 200);
  //  }


  public function createCat(Request $request)
  {
     $validator=$request->validate([
         'category'=>['required']
     ]);

     $post=new Category();

     $post->name=$request->input('category');

     $post->save();

    return response()->json(['success'=>true],200);

  }

  public function getCategory(Request $request)
  {
    $category=Category::orderBy('created_at','desc')->get();
    return CategoryResource::collection($category);
  }

  public function getByCat(Request $request,$category)
  {
    $post=EvsFeed::where("category",$category)->get();
    return EvsResource::collection($post);
  }



  public function deleteCat(Request $request,$id) {
           
      Category::destroy($id);
   
   return response()->json(['success'=>$id]);
  }
}