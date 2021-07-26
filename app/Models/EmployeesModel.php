<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeesModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = []; 

    protected $table = "employees";

    public function getEnterprice(){
        return $this->hasOne(EnterpriceModel::class, 'id', 'enterprice_id');
    }
}
