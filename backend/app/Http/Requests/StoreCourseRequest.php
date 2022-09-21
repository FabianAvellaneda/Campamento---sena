<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => 'required|max:30|min:10',
            "description" => 'required|min:10',
            "weeks" => 'required|max:9',
            "enroll_cost" => 'required|numeric',
            "minimum_skill" => 'required|in:Beginner,Intermediate,Advanced,Expert)',
            "bootcamps_id" => 'required'
        ];
    }
    public function messages(){
        return[ 
        'title.required' => 'Titulo Requerido.',
        'title.max' =>'El titulo no puede ser mayor a :max caracteres.',
        'title.min' =>'El titulo no puede ser menor a :min caracteres.',
        'description.required' => 'Descripcion requerida.',
        'description.min' => 'La descripcion no puede ser menor a :min caracteres.',
        'weeks.required' => 'Semanas requeridas.',
        'weeks.max' => 'El número máximo de semanas para un curso es :max',
        'enroll_cost.required' => 'El costo de la inscripcion es requerida.',
        'enroll_cost.numeric' => 'El costo de la inscripcion debe ser numerico.',
        'minimum_skill.required' => 'Habilidad minima requerida.',
        'minimum_skill.in' => 'El valor a ingresar debe ser alguno, y solo alguno de los siguientes: Beginner. Intermediate, Advanced, Expert',
        ];
    }
    //agregar metodo para enviar respuesta con errores de validacion
    protected function failedValidation(Validator $v){
        //Si la  validacion falla se lanza una excepcion http
        throw new HttpResponseException( 
            response()->json(["success"=> false,
            "erros" => $v->errors()
        ], 422 )
        );
    }
}
