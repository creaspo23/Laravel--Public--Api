<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UserRequest;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UserRequestController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user
            ->requests()
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate data
        $data = $request->only('name', 'gender', 'age', 'addresss', 'injury', 'phone_number');
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'gender' => 'required',
            'age' => 'required',
            'addresss' => 'required',
            'injury' => 'required',
            'phone_number' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new Request
        $userRequest = $this->user->requests()->create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
            'gender' => $request->gender,
            'age' => $request->age,
            'addresss' => $request->addresss,
            'injury' => $request->injury,
            'phone_number' => $request->phone_number,

        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'request sended successfully',
            'data' => $userRequest
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userRequest = UserRequest::findOrFail($id);
        return response()->json($userRequest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $userRequest = UserRequest::findOrFail($id);

        $userRequest->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
            'age' => 'required',
            'addresss' => 'required',
            'injury' => 'required'

        ]);

        $userRequest->name = $request->get('name');
        $userRequest->gender = $request->get('gender');
        $userRequest->age = $request->get('age');
        $userRequest->addresss = $request->get('addresss');
        $userRequest->injury = $request->get('injury');


        $userRequest->save();

        return response()->json($userRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->delete();

        return response()->json($userRequest::all());
    }
}
