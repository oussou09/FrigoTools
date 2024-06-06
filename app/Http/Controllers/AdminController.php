<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // public function homeadmin() {
    //     return view('admin.index');
    // }


    // public function listusers() {
    //     $users = User::orderBy('id', 'asc')->get();
    //     return view('admin.adminContent', [
    //         'title' => 'All Users',
    //         'users' => $users
    //     ]);
    // }

    // public function edituser($id) {
    //     $users = User::findOrFail($id);
    //     return view('admin.adminContent', [
    //         'title' => 'All Users',
    //         'users' => $users
    //     ]);
    // }

    public function loginAdmin() {
        return view('admin.LoginAdmin');
    }

    public function loginAdminRequ(Request $request) {
        $request->validate([
            'FullName' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('FullName', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            if ($user) {
                $request->session()->regenerate();
                $request->session()->put('adminameinfo', $user->username);
                return redirect()->route('admin.index');
            } else {
                abort(404);
            }
        }
        return redirect()->route('admin.loginAdmin')->with('error', 'Invalid username or password');
    }

    public function logoutAdmin() {
        $sessionUserAdmin = '';

        if (session()->has('adminameinfo')) {
            $sessionUserAdmin = session('adminameinfo');
        }
        Auth::guard('admin')->logout();
        $message = 'Successful logout ' . $sessionUserAdmin . '.';
        return redirect()->route('admin.loginAdmin')->with('LogoutSuccess', $message);
    }



    // public function listcontact() {
    //     $message_contact = Contact::orderBy('id', 'asc')->get();
    //     return view('admin.adminMessagesCenter',['messages'=>$message_contact]);
    // }

    // public function showmessage($id) {
    //     $message_user = Contact::findOrFail($id);
    //     return view('admin.ShowMessage', compact('message_user'));
    // }

    // public function destroymessage($id) {
    //     $message_user = Contact::findOrFail($id);
    //     $message_user->delete();

    //     return redirect()->back();
    // }
}
