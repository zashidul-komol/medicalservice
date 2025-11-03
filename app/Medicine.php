<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model {
	//public $timestamps = false;
	protected $guarded = array('id');

	public function appointments() {
        return $this->belongsTo(Medicine::class);
    }

}
