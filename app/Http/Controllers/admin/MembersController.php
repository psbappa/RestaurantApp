<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Member;
use Illuminate\Support\Facades\File;

class MembersController extends Controller
{
    public function index() {
        // $allMembers = Member::all()->toArray();
        $allMembers = Member::orderBy('id', 'desc')->get()->toArray();
        return view('admin.members.members',compact('allMembers'));
    }

    public function saveMember(Request $request, $id) {
        if($id == null) {
            $this->validate($request,[
                'membername'=> 'required',
                'designation' => 'required',
                'description'=> 'required'
            ]);
    
            // dd($member);
            if ($request->hasFile('profileimage')) {
                $files = $request->file('profileimage');
                $image_name = time().'_'.rand(1000,10000).'_'. preg_replace('/[^a-zA-Z0-9_.]/', '', $files) .'.'.$files->getClientOriginalExtension();
    
                $member = new Member;
            
                $member->membertname = $request['membername'];
                $member->designation = $request['designation'];
                $member->description = $request['description'];
                $member->profileimage = $image_name;
                // dd($member);
                $destinationPath = public_path('/images/members');
                $image_upload = $files->move($destinationPath, $image_name);
                if($image_upload) {
                    $member->save();
                    return back()->with('success','You have successfully upload image.');
                } else {
                    return Redirect::back()->withInput(Input::all());
                }
            }
        } else {
            $member = Member::find($id);
            $existingImage = $member['profileimage'];

            $this->validate($request,[
                'membername'=> 'required',
                'designation' => 'required',
                'description'=> 'required'
            ]);

            if ($request->hasFile('profileimage')) {
                if(File::exists(public_path('images/members/'.$existingImage))) {
                    File::delete(public_path('images/members/'.$existingImage));
                }

                $files = $request->file('profileimage');
                $image_name = time().'_'.rand(1000,10000).'_'. preg_replace('/[^a-zA-Z0-9_.]/', '', $files) .'.'.$files->getClientOriginalExtension();
                $destinationPath = public_path('/images/members');
                $image_upload = $files->move($destinationPath, $image_name);
                $data = [
                    'profileimage'     => $image_name
                ];
                $update_member = Member::where('id',$request['id'])->update($data);
            }

            $data = [
                'membertname'                => $request['membername'],
                'designation'               => $request['designation'],
                'description'               => $request['description']
            ];

            $update_member = Member::where('id',$request['id'])->update($data);
            if($update_member) {
                return redirect()->route('members')->withSuccess('members Updated Successfully!');
            } else {
                return Redirect::back()->withInput($request->all());
            }

        }
    }

    public function edit_member_form($id) {
        $member_data = Member::where('id',$id)->first();
        return view('admin/members/edit_member_form',compact('member_data'));
    }

    public function delete_member($id) {
        $member = Member::find($id);
        $existingImage = $member['profileimage'];
        $delete_member = Member::where('id',$id)->delete();
        if($delete_member) {
            if(File::exists(public_path('images/members/'.$existingImage))) {
                File::delete(public_path('images/members/'.$existingImage));
            }
        return redirect()->route('members')->withSuccess('Member deleted Successfully!');
        }
    }
}
