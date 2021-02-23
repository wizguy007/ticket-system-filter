<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function agents()
    {
        return $this->belongsToMany(User::class, 'agent_group', 'group_id', 'agent_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
