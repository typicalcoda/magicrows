<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

	public function getIdAttribute(){
		return $this->attributes['id'];
	}
    
}
