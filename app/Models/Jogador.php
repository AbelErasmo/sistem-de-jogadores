<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    use HasFactory;

    protected $table = 'jogadores';
    protected $primaryKey = 'id_jogador';
    public $incrementing = true;

    protected $fillable = [
        'apelido', 'nome', 'data_nascimento', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}