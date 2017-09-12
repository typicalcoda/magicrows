<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

	public function getIdAttribute(){
		return $this->attributes['id'];
	}
    
}
