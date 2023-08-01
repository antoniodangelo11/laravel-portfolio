<?php

namespace App\Models;

use App\Models\ProjectPaolo;
use App\Models\ProjectAndrea;
use App\Models\ProjectDavide;
use App\Models\ProjectSimone;
use App\Models\ProjectAlessio;
use App\Models\ProjectAntonio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    public function projects_alessio() {
        return $this->hasMany(ProjectAlessio::class);
    }

    public function projects_andrea() {
        return $this->hasMany(ProjectAndrea::class);
    }

    public function projects_antonio() {
        return $this->hasMany(ProjectAntonio::class);
    }

    public function projects_davide() {
        return $this->hasMany(ProjectDavide::class);
    }

    public function projects_paolo() {
        return $this->hasMany(ProjectPaolo::class);
    }

    public function projects_simone() {
        return $this->hasMany(ProjectSimone::class);
    }
}
