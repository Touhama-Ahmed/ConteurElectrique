<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Consomation extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id_Consomation';

    //CRUD methods
    static public function createNewConsomation($data){

        try {
            $consomation = Consomation::create($data);
            return $consomation->save();

        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function updateThisConsomation($data){
        try {
            $this->update($data);
            return $this->save();
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    public function deleteThisConsomation(){
        try{
            return Consomation::find($this->id_Consomation)->delete();
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    //static methods

    //methods
    public function getMaison(){
        return Maison::find($this->Id_Maison);
        // return an object of Maison
    }


}
