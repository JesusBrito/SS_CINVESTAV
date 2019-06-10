<?php
namespace Modules\Documents\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'type',
        'title',
        'publisher',
        'country',
        'editorial',
        'description',
        'document'
    ];

    public function publicacion()
    {
        return $this;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
