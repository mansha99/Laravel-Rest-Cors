<?php

namespace App\Http\Controllers;

use App\Http\Models\Contact;
use \Illuminate\Http\Request;

class ContactController extends Controller {

    public function __construct() {
        //   $this->middleware('cors');
    }

    public function index(\Illuminate\Http\Request $request) {
        $sort = $request->input('sort', 'desc');
        $field = $request->input('field', 'id');
        return Contact::orderBy($field, $sort)->paginate(10);
    }

    public function store(Request $request) {
        $v = [
            'name' => 'required',
            'email' => 'required|email'
        ];
        $model = new Contact();
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $v);
        if ($validator->fails()) {
            return response()->json(array("status" => "fail", "message" => "Validation errors", "errors" => $validator->messages()));
        } else {
            $model->fill($request->all());
            $model->save();
            return response()->json(array(                        
                        "errors" => [],
                        "message" => "success",
                        "status" => "success"));
        }
    }

}
