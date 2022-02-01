<?php

namespace App\Models;

use Deviar\LaravelQueryFilter\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, Filterable;
}
