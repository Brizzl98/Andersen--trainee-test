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

        $formData = new Post();
        $formData->name = $request->input('name');
        $formData->email = $request->input('email');
        $formData->message = $request->input('message');
        $formData->save();
        return redirect('form')->with('status', 'Your Form Data Has Been inserted');

        //Handle the form data
    }
    public function displayFormData()
    {
        $formData = Post::all();
        return view('form', compact('formData'));
    }
}
