<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {
	//public $timestamps = false;

	protected $guarded = array('id');

	protected $casts = [
        'chief_complain_id' => 'array', // if stored as JSON
    ];

    protected $appends = ['chief_complains_names'];
    protected $appendsList = ['chief_complains_names_list'];

	public function medicines() {
		return $this->hasMany(Medicine::class);
	}
	public function employees() {
		return $this->belongsTo(Employee::class, 'employee_id');
	}

	public function getChiefComplainIdAttribute($value)
	{
	    $decoded = json_decode($value, true);

	    return is_array($decoded) ? $decoded : [];
	}
	/*
	public function getChiefComplainsNamesAttribute()
	{
	    $names = $this->chief_complains()->pluck('name')->toArray();

	    return collect($names)
	        ->map(function ($name, $index) {
	            return ($index + 1) . '. ' . $name;
	        })
	        ->implode(' ');
	}
	*/
	public function getChiefComplainsNamesListAttribute()
	{
	    return $this->chief_complains()->pluck('name')->toArray();
	}
	
	public function getChiefComplainsNamesAttribute()
    {
        return $this->chief_complains()
                ->pluck('name')      // get only the names
                ->implode(', ');     // join with comma
    }
 
    public function chief_complains()
	{
	    $ids = $this->chief_complain_id ?? []; // null-safe
	    if (!is_array($ids)) {
	        $ids = json_decode($ids, true) ?: []; // fallback if DB stored as raw JSON string
	    }
	    return ChiefComplain::whereIn('id', $ids)->get();
	}

	public function user() {
        return $this->hasOne(User::class); 
    }
}
