<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Ville extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_Ville';

    //CRUD methods
    static public function createNewVille($data){

        try {
            $ville = Ville::create($data);
            return $ville->save();

        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function updateThisVille($data){
        try {
            $this->update($data);
            return $this->save();
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function deleteThisVille(){
        try{
            return Ville::find($this->id_Ville)->delete();
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    //static methods

    //methods
    public function getRegion(){
        return Region::find($this->Id_Region);
        // return an object of Region
    }

    public function getAllMaisons(){
        return Maison::where('Id_Ville', $this->id_Ville)->orderBy('created_at','desc')->get();
        //returns array of Maisons
    }

}
