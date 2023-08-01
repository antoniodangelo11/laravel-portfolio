<?php

namespace App\Models;

use App\Models\Type;
use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectSimone extends Model
{
    use HasFactory;
    use Slugger;

    protected $table = 'projects_simone';

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
