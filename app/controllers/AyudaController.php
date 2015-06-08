<?php

class AyudaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ayudas = Ayuda::orderBy('id', 'DESC')->get();
		return View::make('backend.ayudas.index', compact('ayudas'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$assigned = false;
		if(Input::has('student')){
			if(Student::find(Input::get('student'))){
				$assigned = Input::get('student');
			}
		}
		return View::make('backend.ayudas.create', compact('assigned'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		$ayuda = new Ayuda($inputs);
		if ($ayuda->save())
		{
			return Redirect::to('/ayudas')->with('alert', ['type' => 'success', 'message' => 'La ayuda ha sido registrada.']);;
		}
		return Redirect::to('/ayudas')->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function aprobar($id){
		$ayuda = Ayuda::find($id);

		if($ayuda){
			$ayuda->status= 'approved';
			$ayuda->save();
			return Redirect::to('/ayudas')->with('alert', ['type' => 'success', 'message' => 'La ayuda ha sido aprobada.']);
		}

		return Redirect::to('/estudiantes')->with('alert', ['type' => 'danger', 'message' => 'Ocurrio un error, intenta mas tarde.']);
	}


}
