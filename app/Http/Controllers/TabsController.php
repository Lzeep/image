<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabsController extends Controller
{
    public function change_tab(Request $request){
        $id = $request->id;
        if ($id == 1){
            $view = view('tabs_panel.about_us')->render();
        }else if($id == 2){
            $view = view('tabs_panel.employee')->render();
        }else if($id == 3){
            $view = view('tabs_panel.gallery')->render();
        }
        return response()->json([
            'view' => $view,
        ]);
    }
}
