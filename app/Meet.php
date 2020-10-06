<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Meet extends Model
{
    use Uuids;
	public $table = "meets";

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
