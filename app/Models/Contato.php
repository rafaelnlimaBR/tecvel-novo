<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppContato;

class Contato extends Model
{
    use HasFactory;
    protected $table    =   "contatos";
    protected $fillable  =  ["numero"];

    public function app(){
        return $this->belongsTo(AppContato::class);
    }
}
