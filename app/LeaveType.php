<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the leave applications for the user.
     */
    public function leaveApplications()
    {
        return $this->hasMany('App\LeaveApplication');
    }
}
