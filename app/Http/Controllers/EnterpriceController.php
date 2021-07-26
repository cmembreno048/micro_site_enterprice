<?php

namespace App\Http\Controllers;

use App\Models\EmployeesModel;
use App\Models\EnterpriceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnterpriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $enterprices = EnterpriceModel::paginate(10);

        return view('enterprice.page_enterprice_show', compact('enterprices'));
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'image' => 'dimensions:min_width=100,min_height=100'
        ];

        $messages = [
            'name.required' => 'Campo necesario',
            'image.dimensions' => 'EL tamaño minimo por imagen es de 100x100 px',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Verifique los campos')->with('typealert', 'danger')->withInput();
        else:

            $enterprice = $request->all();

            if ($request->hasFile('image')) {
                $enterprice['image'] = $request->file('image')->store('public/logos_enterprice');
            }

            $save = EnterpriceModel::create($enterprice);

            if ($save) {
                return back()->with('message', 'Empresa agregada correctamente')->with('typealert', 'success');
            }else{
                return back()->with('message', 'Ocurrio un error al procesar tu solicitud')->with('typealert', 'danger')->withInput();
            }

        endif;
    }

    public function edit($id){

        $enterprice = EnterpriceModel::findorFail($id);

        $enterprices = EnterpriceModel::paginate(10);

        return view('enterprice.page_enterprice_edit', compact('enterprice', 'enterprices'));
    }

    public function update($id, Request $request){

        $rules = [
            'name' => 'required',
            'image' => 'dimensions:min_width=100,min_height=100'
        ];

        $messages = [
            'name.required' => 'Campo necesario',
            'image.dimensions' => 'El tamaño minimo por imagen es de 100x100 px',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Verifique los campos')->with('typealert', 'danger')->withInput();
        else:

            $enterprice = EnterpriceModel::findorFail($id);

            $enterprice->fill($request->all());

            if ($request->hasFile('image')) {
                $enterprice['image'] = $request->file('image')->store('public/logos_enterprice');
            }

            $save = $enterprice->save();

            if ($save) {
                return back()->with('message', 'Empresa actualizada correctamente')->with('typealert', 'success');
            }else{
                return back()->with('message', 'Ocurrio un error al procesar tu solicitud')->with('typealert', 'danger')->withInput();
            }

        endif;

    }


    public function delete($id){

        EnterpriceModel::findorFail($id)->delete();

        EmployeesModel::where('enterprice_id', $id)->delete();

        return redirect('/enterprice')->with('message', 'Empresa Eliminada correctamente')->with('typealert', 'success');

    }
}
