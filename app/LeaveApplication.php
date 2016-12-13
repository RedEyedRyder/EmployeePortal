<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveApplication extends Model
{
    use SoftDeletes;

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     /**
     * Get the user that Applied for the leave.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
     * Get the user that Applied for the leave.
     */
    public function leaveAllowance()
    {
        return $this->belongsTo('App\LeaveAllowance');
    }
}
