<?php

namespace App\Http\Controllers\Admin;

use App\Service\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Utilities\Common;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->searchAndPaginate('name', $request->get('search'));

        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // Cau hinh hien thi thong bao loi o views
    {
        if ($request->get('password') != $request->get('password_confirmation')) {
            return back()
            ->with('notification','Error: Confirm password does not match');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));


        // Xu li file:

        if ($request->hasFile('image')){
            $data['avatar'] = Common::uploadFile($request->file('image'),'./admin/assets/images/avatars');
        }

        $user = $this->userService->create($data);

        return redirect('admin/user/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request -> all();

        // Xu li password
        if ($request->get('password') != null) {
            if ($request->get('password')!= $request->get('password_confirmation')) {
                return back()
                ->with('notification','Error: Confirm password does not match');
            }

        $data['password'] = bcrypt($request->get('password'));
    }else {
        unset($data['password']);
    }

    // Xu li file anh
        if ($request->hasFile('image')){
            //add new img
            $data['avatar'] = Common::uploadFile($request->file('image'),'admin/assets/images/avatars' );
            //xoa file cu
            $file_name_old = $request->get('image_old');
            if ($file_name_old != ''){
                unlink('admin/assets/images/avatars/' .$file_name_old);
            }
        }

    // Update Data
    $this->userService->update($data,$user->id);

    return redirect('admin/user/' .$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $this->userService->delete($user->id);

    //    Delete files:
            $file_name = $user->avatar ;
            if ($file_name != '') {
                unlink('admin/assets/images/avatars/' .$file_name);
    }

    return redirect('admin/user');
   }
}
