<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'member_name', 'department','mobile','email','file_id',
    ];       

    public function file()
    {
        return $this->belongsTo('App\File', 'file_id');
    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }
}
