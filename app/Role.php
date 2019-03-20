<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    public function admin()
    {
        return $this->belongsToMany(Admin::class);
    }
}
