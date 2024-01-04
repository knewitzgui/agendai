<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;

class ConfigurationsController extends Controller{

    public function settings(){

        $settings = Setting::where('key', 'settings')->first();

        $data = array();
        if ($settings){
            $data = json_decode($settings->data, true);
        }


        return view('admin.pages.configurations.settings', ['settings' => $data]);
    }

    public function updateSettings(Request $request){
        $setting = Setting::where('key', 'settings')->first();
        $data['key'] = 'settings';
        foreach ($request->input() as $key => $value) {
            if ($key != '_token'){
                $data['data'][$key] = $value;
            }
        }

        $data['data'] = json_encode($data['data']);
        if ($setting){
            $setting->update($data);
        } else{
            Setting::create($data);
        }

        return redirect()->back()->with(['success' => 'Dados atualizados com sucesso']);
    }

    public function users(){
        
        $data = User::get();

        
        return view('admin.pages.configurations.users', ['users' => $data]);
    }
}
