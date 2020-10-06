<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Vicon extends Model
{
    use Uuids;
	public $table = "vicons";

	protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

	public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
