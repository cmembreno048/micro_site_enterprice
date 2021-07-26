<?php

namespace App\Http\Controllers;

use App\Models\EmployeesModel;
use App\Models\EnterpriceModel;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMain(){

        $countEnterprice = EnterpriceModel::count();
        $countEmployees = EmployeesModel::count();
        $countUsers = User::count();

        return view('home', compact('countEnterprice', 'countEmployees', 'countUsers'));
    }
}
