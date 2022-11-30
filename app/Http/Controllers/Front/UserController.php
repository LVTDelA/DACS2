<?php

namespace App\Http\Controllers\Front;

use App\Service\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Utilities\Common;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        return view('front.user.index',compact('user'));
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

        return redirect('front/user/'.$user->id);
    }

    public function edit(User $user)
    {
        return view('front.user.edit',compact('user'));
    }

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

    return redirect('front/user/' .$user->id);
    }

}
