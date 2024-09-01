<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Services\FetchDataService;
use App\DataTables\Superadmin\UsersDataTable;

class UsersController extends Controller
{
    /**
     * The middleware function is used to restrict access to certain pages based on the user's role
     */
    function __construct()
    {
        $this->middleware('permission:users.index', ['only' => ['index']]);
        $this->middleware('permission:users.create', ['only' => ['create']]);
        $this->middleware('permission:users.store', ['only' => ['store']]);
        $this->middleware('permission:users.show', ['only' => ['show']]);
        $this->middleware('permission:users.edit', ['only' => ['edit']]);
        $this->middleware('permission:users.update', ['only' => ['update']]);
        $this->middleware('permission:users.destroy', ['only' => ['destroy']]);
    }

    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('superadmin.users.index');
    }


    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.users.create');
    }

    /**
     * Store user in database
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', __('تم إضافة المستخدم بنجاح !'));
    }


    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return view('admin.users.show', [
        //     'user' => $user
        // ]);
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('superadmin.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::orderBy('id', 'ASC')->get()
        ]);
    }


    public function update(User $user, Request $request)
    {

        $this->validate($request, [
            'role' => 'required|array',
            'role.*' => 'required|exists:roles,id',
        ]);

        $roles = Role::whereIn('id', $request->get('role'))->pluck('name')->toArray();

        $user->syncRoles($roles);

        return redirect()->route('users.index')->with('success', __('تم تعديل البيانات بنجاح !'));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();

        return redirect()->route('users.index')->with('success', __('تم حذف المستخدم بنجاح !'));
    }
}
