<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

	protected $fillable = [
        'file', 'file_name',
    ];

    public function teamMember()
    {
        return $this->hasOne('App\TeamMember');
    }
}
