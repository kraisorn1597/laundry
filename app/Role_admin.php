<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_admin extends Model
{
    protected $table = 'role_admins';

    protected $fillable = [
        'role_id', 'admin_id',
    ];
}
