<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenContrato extends Model
{
    use HasFactory;
    protected $table    =   'token_contrato';
    protected $fillable =   ['token'];

    public function scopePesquisarPortoken($query, $token)
    {
        return $query->where('token',$token);
    }
}
