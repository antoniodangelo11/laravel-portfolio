<?php

namespace App\Models;

use App\Models\Type;
use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectAlessio extends Model
{
    use HasFactory;
    use Slugger;

    protected $table = 'projects_alessio';

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
