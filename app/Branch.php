<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branches";

    protected $fillable = ["name", 'description'];

    public function users()
    {
        return $this->hasMany(User::class, 'branch_id', 'id');
    }
}
