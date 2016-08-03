<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class MiFormulario extends Request {
    
    // si hay algun error, direccionar aqui:
    protected $redirect = "home/miformulario";
    
    // devuelve los elementos que vamos a validar, el nombre es el que
    // en el formulario esta en el campo name=""
    public function rules(){
        
        return [
            'nombre'=> 'required|min:3|max:12|regex:/^[a-z]+$/i',
            
        ];
    }
    
    public function messages() {
       return [
           'nombre.required' => 'El campo nombre es requerido',
           'nombre.min' => 'El minimo permitido son 3 caracteres',
           'nombre.max' => 'El maximo permitido son 12 caracteres',
           'nombre.regex'=> 'Solo se aceptan letras',
       ];
    }
    // el withErrors tiene un alias, que es por si tenemos varios formularios
    // el withInṕut() redireccion de los campos del formulario
    public function response(array $errors){
        
        return redirect($this->redirect)
                ->withErrors($errors,'formulario')
                ->withInput();
        
    }
    
    // autorizar a todos los usuarios a enviar a la ruta definida previamente
    public function authorize(){
        return true;
    }
    
}