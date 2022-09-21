<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testinput;
use App\Models\Secondtestinput;
use Image;

class Inputtest extends Controller
{
    public function add(Request $req){
        $validatedData = $req->validate([
            'text' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer'],
            'image' => ['image', 'max:2048'],
        ]);

        $testinput = new Testinput;
        $image = request()->file('image');
        if($image){
            $name = hexdec(uniqid());
            $extension = $image->getClientOriginalExtension();
            $fullname = $name.'.'.$extension;
            $path = 'public/images/testinputs/images/';
            $url = $path.$fullname;
            $resize_image=Image::make($image->getRealPath());
            $resize_image->resize(300,300);
            $resize_image->save('public/images/testinputs/images/'.$fullname);
            $testinput -> text = $req -> text;
            $testinput -> number = $req -> number;
            $testinput -> image = $url;
            $testinput -> save();
            return redirect()->route('welcome')->with('message','Data successfully added');
        }
        else{
            $testinput -> text = $req -> text;
            $testinput -> number = $req -> number;
            $testinput -> save();
            return redirect()->route('welcome')->with('message','Data successfully added');
        }
    }
    public function view(){
        $views = Testinput::with('secondtestinputs')->get();
        return view('view', compact('views'));
    }
    public function update($id){
        $update = Testinput::findorfail($id);
        return view('update', ['update' => $update]);
    }
    public function update2(Request $req, $id){
        $validatedData = $req->validate([
            'text' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer'],
            'image' => ['image', 'max:2048'],
        ]);

        $testinput = Testinput::findorfail($id);
        $image = request()->file('image');
        if($image){
            $old_image=$testinput->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $name = hexdec(uniqid());
            $extension = $image->getClientOriginalExtension();
            $fullname = $name.'.'.$extension;
            $path = 'public/images/testinputs/images/';
            $url = $path.$fullname;
            $resize_image=Image::make($image->getRealPath());
            $resize_image->resize(300,300);
            $resize_image->save('public/images/testinputs/images/'.$fullname);
            $testinput -> text = $req -> text;
            $testinput -> number = $req -> number;
            $testinput -> image = $url;
            $testinput -> save();
            return redirect()->route('view')->with('message','Data successfully updated');
        }
        else{
            $testinput -> text = $req -> text;
            $testinput -> number = $req -> number;
            $testinput -> save();
            return redirect()->route('view')->with('message','Data successfully updated');
        }
    }
    public function delete($id){
        $delete = Testinput::findorfail($id);
        $image  = $delete->image;
        if(file_exists($image)){
            unlink($image);
        }
        Secondtestinput::where('ti_id', $id)->delete();
        $delete->delete();
        return redirect()->route('view')->with('error','Data successfully deleted');
    }
    public function add2(){
        $first_tables=Testinput::all();
        return view('add', ['first_tables' => $first_tables]);
    }
    public function add3(Request $req){
        $validatedData = $req->validate([
            'text2' => ['required', 'string', 'max:255'],
            'ti_id' => ['required'],
        ]);

        $secondtestinput = new Secondtestinput;
        $secondtestinput -> text2 = $req -> text2;
        $secondtestinput -> ti_id = $req -> ti_id;
        $secondtestinput->save();
        return redirect()->route('add2')->with('message','Data successfully added');
    }
    public function view2(){
        $views = Secondtestinput::all();
        return view('view2', ['views' => $views]);
    }
    public function update3($id){
        $update = Secondtestinput::findorfail($id);
        $first_tables = Testinput::all();
        return view('update2', ['update' => $update, 'first_tables' => $first_tables]);
    }
    public function update4(Request $req, $id){
        $validatedData = $req->validate([
            'text2' => ['required', 'string', 'max:255'],
            'ti_id' => ['required'],
        ]);

        $secondtestinput = Secondtestinput::findorfail($id);
        $secondtestinput -> text2 = $req -> text2;
        $secondtestinput -> ti_id = $req -> ti_id;
        $secondtestinput -> save();
        return redirect()->route('view2')->with('message','Data successfully updated');
    }
    public function delete2($id){
        Secondtestinput::findorfail($id)->delete();
        return redirect()->route('view2')->with('error','Data successfully deleted');
    }
}
