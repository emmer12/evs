<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EvsResource;

use App\EvsFeed;

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
}