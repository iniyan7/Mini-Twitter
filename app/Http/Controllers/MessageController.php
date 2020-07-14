<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Validator;
use DB;
use Session;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function list() {
    	$messages = Message::orderBy('id', 'desc')->take(10)->get();
    	return view('post_list', ['messages' => $messages]);
    }

    public function addForm() {

    	return view('post_form');
    }

    public function save(Request $request) {
    	// dd($request->all());
    	try{
    		$validator = Validator::make($request->all(), [
    			'full_name' => [
    				'required: true',
    				'regex:/^[a-zA-Z0-9_\-\s]*$/',
    				'max:50',
    				'min:3',
    			],
    			'message' => [
    				'required: true',
    				'max:500',
    				'min:50',
    				// 'regex:/^[a-zA-Z_.,\/#$!-\s]*$/',
    			],
    		]);
			if ($validator->fails()) {
				return response()->json(['success' => false, 'errors' => $validator->errors()->all()]);
			}

			DB::beginTransaction();
			$messages = Message::create([
				'full_name' => $request->full_name,
				'message' => $request->message,
				'status' => 'active',
				'created_at' => 'date("Y-m-d H:i:s")'
			]);

			DB::commit();
			return response()->json([
					'success' => true,
					'message' => 'Post Created Successfully',
				]);
			// return redirect('/');
    	} catch(Exception $e) {
    		DB::rollBack();
			return response()->json(['success' => false, 'errors' => ['Exception Error' => $e->getMessage()]]);
    	}
    }
}
