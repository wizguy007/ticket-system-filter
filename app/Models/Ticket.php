<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
