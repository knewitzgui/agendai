<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\Helper;

class UserController extends Controller{

    public function profile(Request $request){
        $id = $request->get("id");
        if (!$id){
            $data = User::find(Auth::user()->id);
        } else {
            $data = User::find($id);
        }

        return view('admin.pages.profile.index', ['profile' => $data]);
    }

    public function update(Request $request){
        $input = $request->input();

        $data['name'] = trim($input['name']);
        $data['email'] = trim($input['email']);
        $data['phone'] = Helper::clearString($input['phone']);
        
        $check = User::where('email', $data['email'])->get();
        if (count($check) > 0 && $check[0]->id != $input['user_id']){
            return redirect()->back()->with(['error' => 'Email ja cadastrado']);
        } else {
            $user = User::find($input['user_id']);
            if ($user){
                $user->update($data);
                return redirect()->back()->with(['success' => 'Dados atualizados']);
            } else {
                return redirect()->back()->with(['error' => 'Erro ao salvar informações, contate o suporte']);
            }
        }

    }

    public function updatePassword(Request $request){
        $input = $request->input();

        $data['password'] = Hash::make(trim($input['password']));
        
        $user = User::find($input['user_id']);
        if ($user){
            $user->update($data);
        } else {
            return redirect()->back()->with(['error' => 'Erro ao salvar informações, contate o suporte']);
        }

        return redirect()->back()->with(['success' => 'Senha atualizada']);
    }

    public function image(Request $request){

        $user = User::find($request->input('user_id'));
        $user->clearMediaCollection('default');
        $user->addMedia($request->file('image'))->toMediaCollection('default');

        return redirect()->back()->with(['success' => 'Imagem enviada']);
    }

    public function insert(Request $request){
        $post = $request->input();

        $checkUser = User::where('email', trim($post['email']))->get();
        if (count($checkUser) > 0){
            return redirect()->back()->with(['error' => 'Email ja cadastrado']);
        } else {
            $dataUser['name'] = $post['name'];
            $dataUser['email'] = trim($post['email']);
            $dataUser['phone'] = "";
            $dataUser['cnpj'] = "";
            $dataUser['role_id'] = 0;
            $dataUser['password'] = '';
            $info = User::create($dataUser);
            $userId = $info->id;
    
            return redirect()->route('admin.profile', ['id' => $userId]);
        }

    }
}
