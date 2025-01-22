<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table    =   "status";

    public function proximosStatus()
    {
        return $this->belongsToMany(Status::class,'status_status','status_atual_id','status_proximo_id');
    }
}
