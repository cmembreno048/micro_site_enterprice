<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeesModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "employees";
}
