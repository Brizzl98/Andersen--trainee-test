<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class FormController extends Controller
{
    public function form()
    {
        return view('form');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        $info = new Post;
        $info->name = $request->name;
        $info->email = $request->email;
        $info->message = $request->message;
        $info->save();
        return redirect('form')->with('status', 'Your Form Data Has Been inserted');

        //Handle the form data
    }
}
