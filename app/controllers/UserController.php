<?php

class UserController extends BaseController {

	public function dashboard()
	{
		return View::make('backend.dashboard');
	}

    public function index()
    {
        $users = User::all();

        return View::make('backend.users.index', compact('users'));
    }


    public function create()
    {
        return View::make('backend.users.create');
    }

    public function store()
    {
        $inputs = Input::all();
        $rules = User::$rules;
        $messages = User::$messages;

        //dd($inputs);

        $rules['password'] = $rules['password'] . '|confirmed';
        $rules['password_confirmation'] = 'required';
        unset($rules['description']);

        $v = Validator::make($inputs, $rules, $messages);

        if ($v->passes())
        {
            $user = User::create($inputs);
            return Redirect::to('/user/' . $user->id);
        }else{
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return View::make('backend.users.show', compact('user'));
    }


    public function update($id)
    {
        $inputs = Input::all();

        //dd($inputs);

        $rules = User::$rules;
        $messages = User::$messages;

        unset($rules['description']);

        if($inputs['password'] == ''){
            unset($rules['password']);
            unset($inputs['password']);

            unset($rules['password_confirmation']);
            unset($inputs['password_confirmation']);
        }else{
            $rules['password'] .= '|confirmed';
        }

        unset($rules['type']);
        unset($rules['username']);
        $rules['email'] .= ',email,' . $id;

        $v = Validator::make($inputs, $rules, $messages);

        if ($v->passes())
        {
            $user = User::find($id);
            $user->fill($inputs);
            if ($user->save()){
                return Redirect::to('/user/' . $id)->with('alert', ['type' => 'success', 'message' => 'El usuario se ha actualizado.']);
            }

        }
        return Redirect::back()->withInput()->withErrors($v->messages());
    }

    public function destroy($id)
    {
        User::destroy($id);
        return Redirect::to('/user');
    }


}