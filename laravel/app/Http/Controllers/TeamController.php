<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamMember;
use App\TeamMemberFileAssoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if (!isset($request->page)) {
            $request->page = 1;
        }
        $limit = 10;
        $teamList = Team::with("teamMember","project")->paginate($limit,['*'],'page',$request->page);
        $startIndex = ((($request->page-1)*$limit)+1);
        return view('team/index',compact('teamList','startIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        $existing_team_details = Team::where('user_id', Auth::user()->id)->first();
        
        $team_id = isset($existing_team_details->id) ?? null ;

        if (!isset($existing_team_details->id)) {

            $team = Team::create([
                        'email' => $request['email_address'],
                        'institute_name' => $request['institute_name'],
                        'name' => $request['team_name'],
                        'project_id' => $request['project_name'],
                        'team_size' => $request['team_size'],
                        'agreement' => $request['check_declaration'],
                        'user_id' => $request['user_id'],
                        'is_profile_updated' => true,
            ]);

            $team_member = [];            
            $team_id  = $team->id;
            
            for ($i = 0; $i < $request['team_size']; $i++) {
                $obj = [
                    'team_id' => $team->id,
                    'member_name' => $request['team_members_name'][$i],
                    'department' => $request['team_department'][$i],
                    'mobile' => $request['team_mobileno'][$i],
                    'email' => $request['team_emailId'][$i],
                    'file_type' => $request['team_file_type_id'][$i],
                    'file_id' => $request['file_id'][$i],
                ];
                array_push($team_member, $obj);
            }
            
            $team_member = TeamMember::insert($team_member);
        }

        return redirect('/user/payment_details')->with(['team_id' => $team_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update_payment(Request $request) {
        $team = Team::find((int) $request['team_id']);

        $team->payment_type = $request['payment_type'];
        $team->transaction_id = $request['transaction_id'];
        $team->amount = $request['payment_amount'];

        if($team->save()){
            return redirect('/home');
        }  
    }

    public function update_payment_status($team_id) {        
        $team = Team::find((int) $team_id);  
        $team->payment_verified = true;
        if($team->save())
            return $team;
        //return back()->with('status', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team) {
        //
    }

    public static function is_profile_updated($user_id) {
        $data = Team::where([
                    ['user_id', '=', $user_id],
                    ['is_profile_updated', '=', 1]
                ])->with('teamMember')->first();
        return $data;
    }

    public function view($team_id){
        $team = Team::with("teamMember.file","project")->find((int) $team_id)->toArray(); 
        return view('team/view_profile',compact('team'));

    }

    public function validate_name(Request $request) {
        $data = Team::where([
                    ['name', '=', $_GET["team_name"]]                    
                ])->first();

        if(isset($data->id)){
            die( json_encode(false));
        }else{
            die( json_encode(true));
        }
    }

}
