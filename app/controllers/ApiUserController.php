<?php

class ApiUserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Search
		$query = '';
		
		// where
		if ($query = e(Input::get('q')))
		{
			$users = User::where('name', 'LIKE', '%' . $query . '%')
				->orderBy('name', 'asc')
				->limit(10)
				->get();
		} else {
			$users = User::all();
		}
		
		// Json return
		return Response::json($users);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = [
			'name'    => 'required',
			'gender'  => 'required',
			'company' => 'required',
			'email'   => 'required|Email',
			'phone'   => 'required|numeric',
			'address' => 'required'
		];
		
		// Get all the inputs.
		$inputs = Input::all();
		
		// Validator
		$validator = Validator::make($inputs, $rules);
		
		// process
		if ($validator->fails()) {
			return Response::json(['return' => false]);
		} else {			
			// store
			$mUser = new User;
			$mUser->name    = Input::get('name');
			$mUser->gender  = Input::get('gender');
			$mUser->company = Input::get('company');
			$mUser->email   = Input::get('email');
			$mUser->phone   = Input::get('phone');
			$mUser->address = Input::get('address');
			$mUser->save();

			// Json return
			return Response::json($mUser);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the user
		$users = User::where('id', '=', $id)->first();
		
		// Validator
		if(!empty($users)){
			return Response::json($users);
		} else {
			return Response::json(['return' => false]);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = [
			'name'    => 'required',
			'gender'  => 'required',
			'company' => 'required',
			'email'   => 'required|Email',
			'phone'   => 'required|numeric',
			'address' => 'required'
		];
		
		// Get all the inputs.
		$inputs = Input::all();
		
		// Validator
		$validator = Validator::make($inputs, $rules);
		
		// process
		if ($validator->fails()) {
			return Response::json(['return' => false]);
		} else {
			// store
			$mUser = User::find($id);
			$mUser->name    = Input::get('name');
			$mUser->gender  = Input::get('gender');
			$mUser->company = Input::get('company');
			$mUser->email   = Input::get('email');
			$mUser->phone   = Input::get('phone');
			$mUser->address = Input::get('address');
			$mUser->save();
			
			// Json return
			return Response::json($mUser);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Find
		$mUser = User::find($id);
		
		// delete
		if(!empty($mUser)){
			$mUser->delete();
			$return = ['return' => true];
		} else {
			$return = ['return' => false];
		}
		
		// Json return
		return Response::json($return);
	}

}
