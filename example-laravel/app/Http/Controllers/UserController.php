<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserController extends Controller
{

    public function index()
    {
        return $this->responseSuccess(User::all());
    }


    public function new(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),$user->rules());

        if ($validator->fails())
        {
            return $this->responseError($validator->getMessageBag());
        }

        $user->setNombres($request->nombres);
        $user->setApellidos($request->apellidos);
        $user->setCedula($request->cedula);
        $user->setCorreo($request->correo);
        $user->setTelefono($request->telefono);
        $user = $user->fill($user->getArray());
        $user->save();
        return $this->responseSuccess($user);
    }

    /**
     * @param Request $request
     * @param User    $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteIn(Request $request, User $user){
       $users = DB::table("user")->whereIn("id",$request->all()["where"])->delete();
       DB::commit();
       return $this->responseSuccess(["menssage"=>"Usuarios Eliminados", "cantidad" => count($request->all()["where"])]);
    }


    public function show(User $user,$id)
    {
        $user = $user::find($id);
        if (!$user) {
            return $this->responseError("no existe el usuario");
        }
        return $this->responseSuccess($user);
    }


    public function edit(Request $request,User $user,$id)
    {
        $users = $user::find($id);
        if (!$user)
        {
            return $this->responseError("no existe el usuario");
        }
        $user->setId($id);
        $users->nombres = !empty($request->nombres) ? $request->nombres : $users->nombres;
        $users->apellidos = !empty($request->apellidos) ? $request->apellidos : $users->apellidos;
        $users->cedula = !empty($request->cedula) ? $request->cedula : $users->cedula;
        $users->correo = !empty($request->correo) ? $request->correo : $users->correo;
        $users->telefono = !empty($request->telefono) ? $request->telefono : $users->telefono;

        $validator = Validator::make(
            $users->toArray(),
            $user->rules()
        );

        if ($validator->fails())
        {
            return $this->responseError($validator->getMessageBag());
        }
        try{
            $users->fill($users->toArray())->save();
        }catch (QueryException $e){
            $error = is_numeric(explode("'",$e->getMessage())[1]) ? "Cedula ya en uso" : "Correo ya en uso";
            return $this->responseError($error);
        }
        return $this->responseSuccess($users->toArray());
    }


    public function delete(Request $request, User $user, $id)
    {
        $users = $user::find($id);
        if (!$user)
        {
            return $this->responseError("no existe el usuario");
        }
        $users->delete();
        return $this->responseSuccess("usuerio eliminado");
    }

}
