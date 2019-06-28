<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Mentors;

class MentorsController extends Controller
{
    public function importMentors(Request $request) {

        try {
          $path = $request->file('csv_file')->getRealPath();
          $datas = Excel::load($path, function($reader) {

          })->get()->toArray();

          $array = array();
          foreach($datas as $data) {
             if($data['project_name']!=null && $data['embedded'] != null && $data['android'] != null && $data['web'] != null){
               unset($data["0"]);
               $array[] =implode(', ', ['"' .$data['project_name'] .'"' , '"' .$data['embedded'].'"' ,'"' .$data['android'].'"' ,'"' .$data['web'].'"']);
             }
           }
           if(count($array)>0){
                 $array = Collection::make($array);
                 $insertString = '';
                 foreach ($array as $ch) {
                     $insertString .= '(' . $ch . '), ';
                 }
                 $insertString = rtrim($insertString, ", ");
                $model =  DB::insert("INSERT INTO mentors (`project_name`, `embedded`,`android`, `web`) VALUES $insertString ON DUPLICATE KEY UPDATE `project_name`=VALUES(`project_name`),`embedded`=VALUES(`embedded`),`android`=VALUES(`android`),`web`=VALUES(`web`) ");
                return response()->json(['status_code' => 200, 'message' => 'User Imported successfully', 'data' => $model]);

         } else {
             throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to import empty.');
         }
        } catch (\Exception $e) {
          throw new \Dingo\Api\Exception\StoreResourceFailedException('Data already enter/in valid data in file',[$e->getMessage()]);
        }
	}


	public function index(Request $request) {
        if (!isset($request->page)) {
            $request->page = 1;
        }
        $limit = 10;
        $mentors = Mentors::paginate($limit,['*'],'page',$request->page);
        $startIndex = ((($request->page-1)*$limit)+1);
        return view('mentor_info',compact('mentors','startIndex'));
    }
}
