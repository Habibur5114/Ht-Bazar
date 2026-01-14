<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {

        return view('Admin.pages.dashboard');
    }

    public function adminlist()
    {

        $admins = Admin::with('roles')->get();

        return view('Admin.admin.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::get();

        return view('Admin.admin.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->status = $request->status;
        $admin->role = $request->role;
        $admin->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/admins'), $imageName);
            $admin->image = 'uploads/admins/'.$imageName;
        }

        $admin->save();

        $role = Role::findById($request->role, 'admin');
        $admin->assignRole($role);

        return redirect()->route('admin.index')->with('success', 'Admin created successfully!');
    }

    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        $roles = Role::get();

        return view('Admin.admin.edit', compact('admins', 'roles'));
    }

    public function update(Request $request, $id)
    {

        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,id',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->status = $request->status;
        $admin->role = $request->role;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {

            if ($admin->image && is_file(public_path($admin->image))) {
                unlink(public_path($admin->image));
            }

            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/admins'), $imageName);
            $admin->image = 'uploads/admins/'.$imageName;
        }

        $admin->save();
        $role = Role::findById($request->role, 'admin');
        $admin->syncRoles($role);

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully!');
    }

    public function showLoginForm()
    {
        return view('Admin.pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['status'] = 1;

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.showLoginForm');
    }

    public function password($id)
    {

        $admins = Admin::findOrFail($id);

        return view('Admin.admin.password', compact('admins'));
    }

    public function passwordchange(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        if (! Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        $request->validate([
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.adminlist')->with('success', 'Password changed successfully.');
    }
}
