<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
	public function getIdAttribute(){
		return $this->attributes['id'];
	}
}
