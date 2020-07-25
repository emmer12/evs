<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Bridge\User as PassUser;
use App\Http\Resources\Users as UserResouces;
use App\Http\Resources\Mentor as MentorResouces;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(4);
        return UserResouces::collection($users);
    }

    public function mentor(Request $request)
    {

        if($request->input('sub_cat') && $request->input('sub_cat')!='null' ){
            $sub=unserialize($request->input('sub_cat'));
            $mentors=User::where("role","Mentor")->get();
            foreach ($mentors as $mentor) {
                $q[]=$mentor->sub_category;
                if (in_array($mentor->sub_category,$sub)) {
                    $mentorFilter[]=User::find($mentor->id);
                }
            }
            return ['data'=>$mentorFilter];
        }else{
            $mentorFilter=User::where("role","Mentor")->paginate(5);
        }
        return MentorResouces::collection($mentorFilter);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
