<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Maison extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_Maison';

    //CRUD methods
    static public function createNewMaison($data){

        try {
            $maison = Maison::create($data);
            return $maison->save();

        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function updateThisMaison($data){
        try {
            $this->update($data);
            return $this->save();
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function deleteThisMaison(){
        try{
            return Maison::find($this->id_Maison)->delete();
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    //static methods
    static public function findById($Id){
        return User::where('Id_User', $Id)->first();
        //returns object of User
    }

    //methods
    public function getVille(){
        return Ville::find($this->Id_Ville);
        // return an object of Ville
    }
    public function getUser(){
        return User::find($this->Id_User);
        // return an object of User
    }

    public function getAllConsomations(){
        return Consomation::where('Id_Maison', $this->id_Maison)->orderBy('created_at','desc')->get();
        //returns array of Consomations
    }

}
