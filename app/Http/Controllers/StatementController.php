<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Statement;
use App\Models\User;

class StatementController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index(User $user)
    {
        $posts = Statement::where('user_id', Auth::user()->id)
            // ->orderBy('status_name', 'desc')
            ->orderBy(Statement::raw('case when status_name= "none" then 1 when status_name="accept" then 2 when status_name="deny" then 3 end'))
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('user.index', compact('posts'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function send(Request $request)
    {
        $request->validate([
            'gos_num' => ['required', 'regex:/[А-Я]{1}[0-9]{3}[А-Я]{2}/', 'string', 'max:6'],
            'desc' => ['required', 'string'],
        ]);

        Statement::create([
            'gos_num' => $request->gos_num,
            'desc' => $request->desc,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy(Request $request, $id){
        $post = Statement::find($id);
        $post -> delete();

        // return redirect()->route('statement');
        return redirect()->back();
    }

    public function admin(){
        $posts = Statement::
            // orderBy('status_name', 'desc')
            orderBy(Statement::raw('case when status_name= "none" then 1 when status_name="accept" then 2 when status_name="deny" then 3 end'))
            ->orderBy('created_at', 'desc')
            ->paginate(100);
        return view('admin.admin-panel', compact('posts'));
    }

    public function accept(Request $request, $id){
        $post = Statement::find($id);
        $post -> status_name = 'accept';
        $post -> update();

        return redirect()->route('admin-panel');
    }

    public function deny(Request $request, $id){
        $post = Statement::find($id);
        $post -> status_name = 'deny';
        $post -> update();

        return redirect()->route('admin-panel');
    }

    public function cancel(Request $request, $id){
        $post = Statement::find($id);
        $post -> status_name = 'none';
        $post -> update();

        return redirect()->route('admin-panel');
    }
}
