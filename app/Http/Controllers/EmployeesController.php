<?php

namespace App\Http\Controllers;

use App\Models\EmployeesModel;
use App\Models\EnterpriceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){

        $enterprices = EnterpriceModel::all();

        $employees = EmployeesModel::all();

        return view('employees.page_employee_show', compact('employees', 'enterprices'));
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'enterprice_id' => 'required|integer',
            'last_name' => 'required',
        ];

        $messages = [
            'name.required' => 'Campo necesario',
            'enterprice_id.required' => 'Selecciona una empresa',
            'enterprice_id.integer' => 'Selecciona una empresa',
            'last_name.required' => 'Campo necesario',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Verifique los campos')->with('typealert', 'danger')->withInput();
        else:

            $employee = $request->all();

            $save = EmployeesModel::create($employee);

            if ($save) {
                return back()->with('message', 'Colaborador agregada correctamente')->with('typealert', 'success');
            }else{
                return back()->with('message', 'Ocurrio un error al procesar tu solicitud')->with('typealert', 'danger')->withInput();
            }

        endif;
    }

    public function edit($id){

        $enterprices = EnterpriceModel::all();

        $employee = EmployeesModel::findorFail($id);

        $employees = EmployeesModel::paginate(10);

        return view('employees.page_employee_edit', compact('employee', 'employees', 'enterprices'));
    }

    public function update($id, Request $request){

        $rules = [
            'name' => 'required',
            'enterprice_id' => 'required|integer',
            'last_name' => 'required',
        ];

        $messages = [
            'name.required' => 'Campo necesario',
            'enterprice_id.required' => 'Selecciona una empresa',
            'enterprice_id.integer' => 'Selecciona una empresa',
            'last_name.required' => 'Campo necesario',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Verifique los campos')->with('typealert', 'danger')->withInput();
        else:

            $employee = EmployeesModel::findorFail($id);            

            $employee->fill($request->all());

            $save = $employee->save();

            if ($save) {
                return back()->with('message', 'Colaborador actualizada correctamente')->with('typealert', 'success');
            }else{
                return back()->with('message', 'Ocurrio un error al procesar tu solicitud')->with('typealert', 'danger')->withInput();
            }

        endif;

    }


    public function delete($id){

        EmployeesModel::findorFail($id)->delete();

        return redirect('/employees')->with('message', 'Colaborador Eliminada correctamente')->with('typealert', 'success');

    }
}
