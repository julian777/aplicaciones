<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MiFormulario;
use App\Http\Requests\MiCompra;
use Validator;

class HomeController extends Controller {

    public function home() {

        return View('home.home');
    }

    public function getId($id1, $id2) {
        return "<p> id1 es igual a: " . $id1 . "</p><p> id2 es igual a: " . $id2 . "</p>";
    }

    public function showview() {
        $msg = "Mi Laravel 5";
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        return View('home.showview', ['msg' => $msg, 'array' => $array]);
    }

    public function form(Request $request) {
        // el has("name"), se refiere en el form a name="name"
        if ($request->isMethod("post") && $request->has("name")) {

            $name = $request->input("name");
        } else {
            $name = "";
        }
        return View('home.form', ["name" => $name]);
    }

    public function miFormulario() {

        return View("home.miformulario");
    }

    public function miUsuarioA() {

        return View("home.usuarioA");
    }

    public function validarMiFormulario(MiFormulario $formulario) {
        $validator = Validator::make(
                        $formulario->all(), $formulario->rules(), $formulario->messages()
        );
        if ($validator->valid()) {

            if ($formulario->ajax()) {
                return response()->json(["valid" => true], 200);
            } else {

                return redirect('home/miformulario')
                                ->with('message', 'Formulario enviado correctamente');
            }
// return "ok";
        }
    }

    public function validarCompra(MiCompra $formulario2) {
        $validator = Validator::make(
                        $formulario2->all(), $formulario2->rules(), $formulario2->messages()
        );
        if ($validator->valid()) {

            if ($formulario2->ajax()) {
                return response()->json(["valid" => true], 200);
            } else {

                return redirect('home/usuarioA')
                                ->with('message', 'Formulario enviado correctamente');
            }
// return "ok";
        }
    }

    //......................................................

    public function showWelcome() {
        return View::make('hello');
    }

    public function showStudent() {
        return View::make('students');
    }

    public function studentInsert() {
        $postStudent = Input::all();
        //insert data into mysql table
        $data = array('sno' => $postStudent['sno'],
            'sname' => $postStudent['sname'],
            'course' => $postStudent['course']
        );
        //  echo print_r($data);
        $ck = 0;
        $ck = DB::table('studentstbl')->Insert($data);
        echo "Record Added Successfully!";
    }

}
