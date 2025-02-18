<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagensNota extends Model
{
    use HasFactory;
    protected $table    =   'imagens';
    protected $fillable =   ['nome','texto'];

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

}
