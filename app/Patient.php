<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'patients';

    public $primarkey = 'id';

    public $timestamps = 'true';

    
 	public function location(){
 	return $this->hasMany('App\Location');

 	} 
 
}

