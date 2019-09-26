<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayerSetting;

class PlayerSettingController extends Controller
{
    public function get()
    {
    	$ps = PlayerSetting::first();
    	return view('admin.player-setting.edit',compact('ps'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'mimes:png'
        ]);

    	$ps = PlayerSetting::first();
    	//return $request->file('logo');
    	$ps->cpy_text = $request->cpy_text;
    	$ps->share_opt = $request->share_opt;
    	$ps->logo_enable = $request->logo_enable;
    	if($request->logo_enable == 1)
    	{
    		if ($file = $request->file('logo'))
         	{
         		
          	

         	  $name = 'logo.png';

            if($ps->logo !="")
             {
              unlink('content/minimal_skin_dark/'.$ps->logo);
             }

          	$file->move('content/minimal_skin_dark', $name);
            
         	  $ps->logo = $name;
      

         	}
    	}

    	$ps->save();
    	return back()->with('updated','Player Settings Updated !');
    }
}
