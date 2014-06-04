<?php

class UsersController extends BaseController {

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
		
		// load the view
		return View::make('users.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/users/create.blade.php)
		return View::make('users.create');
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
			return Redirect::to('users/create')->withErrors($validator)->withInput($inputs);
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

			// Redirect alert
			return Redirect::to('users')->with('success', 'Creado con éxito!');
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
			// show the view
			return View::make('users.show')->with('users', $users);
		} else {
			// Redirect to the user page.
			return Redirect::to('users')->with('error', 'Error registro no existente.');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the user
		$users = User::where('id', '=', $id)->first();
		
		// Validator
		if(!empty($users)){
			// show the edit
			return View::make('users.edit')->with('users', $users);
		} else {
			// Redirect to the user page.
			return Redirect::to('users')->with('error', 'Error registro no existente.');
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
			return Redirect::to('users/' . $id . '/edit')->withErrors($validator)->withInput($inputs);
		} else {
			// store
			$mUser = User::where('id', '=', $id)->first();
			$mUser->name    = Input::get('name');
			$mUser->gender  = Input::get('gender');
			$mUser->company = Input::get('company');
			$mUser->email   = Input::get('email');
			$mUser->phone   = Input::get('phone');
			$mUser->address = Input::get('address');
			$mUser->save();
			
			// Redirect alert
			return Redirect::to('users')->with('success', 'Actualizado con éxito!');
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
		$mUser = User::where('id', '=', $id)->first();
		
		// delete
		if(!empty($mUser)){
			$mUser->delete();
		} else {
			// Redirect to the user page.
			return Redirect::to('users')->with('error', 'Error registro no existente.');
		}
		
		// Redirect alert
		return Redirect::to('users')->with('success', 'Eliminado con éxito!');
	}

}
