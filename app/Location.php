<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
        protected $table = 'locations';
        public $primarkey = 'id';

    public $timestamps = 'true';

   
	public function patient()
    {
    	return $this->belongsTo('App\Patient');
	}
}