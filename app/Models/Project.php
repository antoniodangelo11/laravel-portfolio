<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Traits\Slugger;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Slugger;
    use Sortable;

    protected $table = 'projects';

    public $sortable = [
        'id',
        'title',
        'creation_date',
        'last_update',
        'collaborators',
        'type_id',
        'user_id',
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
