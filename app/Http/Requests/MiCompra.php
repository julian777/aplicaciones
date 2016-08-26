<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

Class MiCompra extends Request {

    // si hay algun error, direccionar aqui:
    protected $redirect = "home/usuarioA";

    // devuelve los elementos que vamos a validar, el nombre es el que
    // en el formulario esta en el campo name=""
    public function rules() {

        return [
            'password' => 'required|min:6|max:18|regex:/^[a-z]+$/i',
            'email' => 'required|email',
        ];
    }

    public function messages() {

        return [

            'password.required' => 'El campo password es requerido',
            'nombre.min' => 'El mínimo permitido son 6 caracteres',
            'nombre.max' => 'El máximo permitido son 18 caracteres',
            'nombre.regex' => 'Sólo se aceptan letras',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El formato de email es incorrecto',
        ];
    }

    // el withErrors tiene un alias, que es por si tenemos varios formularios
    // el withInṕut() redireccion de los campos del formulario
    public function response(array $errors) {

        if ($this->ajax()) {
            return response()->json($error, 200);
        } else {
            return redirect($this->redirect)
                            ->withErrors($errors, 'formulario2')
                            ->withInput();
        }
    }

    // autorizar a todos los usuarios a enviar a la ruta definida previamente
    public function authorize() {
        return true;
    }

}
