<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function index()
    {
        $complains = Complain::sortable()->simplePaginate();

        return view('complain', compact('complains'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'message' => 'required',
        ]);

        $complain = new Complain();
        $complain->complain_id = uniqid();
        $complain->email = $request->email;
        $complain->message = $request->message;
        $complain->user_id = auth()->id();
        $complain->save();

        session()->put('success', 'Complain submitted successfully');
        return redirect()->back();
    }
}
