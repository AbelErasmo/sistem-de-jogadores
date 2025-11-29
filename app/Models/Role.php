<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{

    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    public $incrementing = true;

    protected $fillable = ['nome'];

    /**
     * Get the users for the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id_role');
    }
}