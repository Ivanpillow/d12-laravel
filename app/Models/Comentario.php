<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flights;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['comentario', 'ciudad', 'user_id']; //Se quitaron nombre y correo
    //protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
