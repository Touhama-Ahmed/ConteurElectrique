<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class User extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_User';

    //CRUD methods
    static public function createNewUser($data){

        try {
            $user = User::create($data);
            return $user->save();

        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function updateThisUser($data){
        try {
            $this->update($data);
            return $this->save();
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function deleteThisUser(){
        try{
            return User::find($this->id_User)->delete();
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    //static methods
    static public function findByEmail($Email){
        return User::where('Email_User', $Email)->first();
        //returns object of User
    }

    //methods

    public function getAllMaisons(){
        return Maison::where('Id_User', $this->id_User)->orderBy('created_at','desc')->get();
        //returns array of Maisons
    }

}
