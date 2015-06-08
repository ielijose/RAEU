<?php

class Student extends Model {

    protected $table = 'students';
    public $timestamp = true;

    protected $fillable = ['name', 'ci', 'carrera', 'instituto', 'gender', 'phone', 'email', 'address'];


	protected static $rules = [
        'name' => 'required',
		'ci' => 'required',
        'carrera' => 'required',
        'instituto' => 'required',
        'gender' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'address' => 'required',
    ];



    /* Scopes */

    /* Relationships */
    public function ayudas(){
        return $this->hasMany('Ayuda', 'student_id', 'id');
    }
    /* Function */


}