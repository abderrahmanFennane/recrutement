<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = [
        'id',
        'cle',
        'organisation_id',
        'e_mail',
        'nom',
        'prenom',
        'telephone_fixe',
        'service',
        'fonction'
    ];
    
    public function soc(): BelongsTo
    {
        return $this->belongsTo('App\Models\organisation','organisation_id','id');
    }
}
