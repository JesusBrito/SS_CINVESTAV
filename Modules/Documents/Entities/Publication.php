<?php
namespace Modules\Documents\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getDocumentAttribute($value)
    {
        return $value ? Storage::url($value) : '';
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
