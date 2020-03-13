<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User();

        if ($request->isMethod('post')) {
            $request->flash();

            $this->validate($request, User::rulesCreate());
            if ($request->post('password') === $request->post('password_confirmation')) {
                //dd($request->post('is_admin'));
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('password')),
                    'email' => $request->post('email'),
                    'is_admin' => ($request->post('is_admin') == 1) ? true : false
                ]);
                $user->save();
                return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно изменен!');
            }
        }

        return view('admin.users.form', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $user->fill([
                'is_admin' => ($request->post('is_admin') == 1) ? true : false
            ]);
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно изменен!');
        }

        return view('admin.users.form', [
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     */
    public function profile(Request $request)
    {
        $user = Auth::user();

        $errors = [];
        if ($request->isMethod('post')) {
            $request->flash();

            $this->validate($request, User::rulesProfile());
            if (Hash::check($request->post('password_old'), $user->password)) {
                if ($request->post('password') === $request->post('password_confirmation')) {
                    $user->fill([
                        'name' => $request->post('name'),
                        'password' => Hash::make($request->post('password')),
                        'email' => $request->post('email'),
                    ]);
                    $user->save();
                    return redirect()->route('admin.user.profile')->with('success', 'Пользователь успешно изменен!');
                } else {
                    $errors['password'][] = 'Новый пароль и подтверждение пароля не совпадают!';
                    return redirect()->route('admin.user.profile')->withErrors($errors);
                }
            } else {
                $errors['password_old'][] = 'Неверный текущий пароль!';
                return redirect()->route('admin.user.profile')->withErrors($errors);
            }
        }

        if (empty($user)){
            return redirect()->route('admin.users.index');
        }

        return view('admin.users.profile', [
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     */
    public function delete(User $user)
    {
        if (empty($user)){
            return redirect()->route('admin.users.index');
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
