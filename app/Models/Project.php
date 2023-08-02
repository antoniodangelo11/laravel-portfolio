<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Slugger;

    protected $table = 'projects';

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
