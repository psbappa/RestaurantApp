<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Project;
Use App\Member;
Use App\ProjectMembers;

class ProjectsController extends Controller
{
    public function index() {
        $allprojects = Project::orderBy('id', 'desc')->get()->toArray();                                        //for project listing
        // $projectsmap = Project::find(4);
        $projectMapData = $allprojects->product();
        dd($projectMapData);
        foreach($allprojects as $value) {
            $arr = json_decode($value['assigned_members']);
            // dd($arr);
            // foreach(json_decode($value['assigned_members']) as $value1) {
                // dd($value1);
            // }
            // dd($value1);
        }
        // $dump = $allprojects['assigned_members'];
        // dd($dump);
        // dd($projectsmap->members());
        $dedicatedMembers = Member::get()->toArray();                                                           //for dropdownmenu
        return view('admin.project.project', compact('allprojects','dedicatedMembers'));
    }

    public function saveProject(Request $request) {
        // $this->validate($request,[
        //     'projectname'=> 'required',
        //     'clientname' => 'required',
        //     'assigned_members'=>'required',
        //     'description'=> 'required',
        //     'startdate'=>'required',
        //     'duedate'=>'required'
        // ]);
        
        $input = $request->all();
        // $input['assigned_members'] = json_encode($input['cat']);
        // dd($input);

        $project = new Project;
        $project->projectname = $request['projectname'];
        $project->clientname = $request['clientname'];
        $project->assigned_members = json_encode($input['assigned_members']);
        $project->description = $request['description'];
        $project->startdate = $request['startdate'];
        $project->duedate = $request['duedate'];
        
        // update project_members table
        $project_members = new ProjectMembers;
        $input['assigned_members'] = json_encode($input['assigned_members']);
        
        // dd(json_decode($input['assigned_members']));
        
        // dd('test');
        if ($project->save()) {
            $lastInsertedId = $project->id;
            foreach(json_decode($input['assigned_members']) as $value) {
                $data = [
                    'project_id' => $lastInsertedId,
                    'member_id'  => $value
                ];
                ProjectMembers::insert($data);
            }
            return redirect()->route('projects')->withSuccess('Projects successfully added');
        }
    }
}
