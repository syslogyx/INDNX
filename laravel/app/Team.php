<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'institute_name','project_id','team_size','agreement','user_id','is_profile_updated','payment_verified'
    ];

    public function teamMember()
    {
        return $this->hasMany('App\TeamMember');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');;
    }
    
}
