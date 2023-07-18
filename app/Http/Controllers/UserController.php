<?php

namespace App\Http\Controllers;

use App\Http\Resources\OficinaResource;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Mail\UsuarioCreado;
use App\Models\Oficina;
use App\Models\Registro;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Swift_TransportException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Users/UserIndex', [
            'users' => User::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Users/Create', [
            'oficinas' => OficinaResource::collection(Oficina::all()),
            'roles' => RoleResource::collection(Role::all()),
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        try{
            $contra = $request->password;
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:' . User::class,
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'oficina_id' => 'required|integer',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'oficina_id' => $request->oficina_id,
            ]);
            $user->syncRoles($request->input('roles.*.name'));
            $user->syncPermissions($request->input('permissions.*.name'));
            $infoUsuario = '1';
        } catch(Exception $e){
            $infoUsuario = '0';
        }

        try {
            Mail::to($user->email)->send(new UsuarioCreado($user, $contra));
            return Inertia::render('Admin/Users/UserIndex', [
                'users' => User::paginate(10),
                'success' => 'Se ha enviado los datos al Correo Electrónico',
                'infoUsuario' => $infoUsuario,
                'users' => User::paginate(10)
            ]);
        } catch (Exception $e) {
            return Inertia::render('Admin/Users/UserIndex', [
                'users' => User::paginate(10),
                'error' => 'No se ha podido enviar los datos al Correo Electrónico',
                'infoUsuario' => $infoUsuario,
                'users' => User::paginate(10)
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $user->load(['roles', 'permissions']);
        return Inertia::render('Admin/Users/Edit', [
            'user' => new UserResource($user),
            'roles' => RoleResource::collection(Role::all()),
            'oficinas' => OficinaResource::collection(Oficina::all()),
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|' . Rule::unique('users', 'email')->ignore($user),
            'roles' => ['sometimes', 'array'],
            'permissions' => ['sometimes', 'array'],
            'oficina_id' => 'required|integer',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'oficina_id' => $request->oficina_id
        ]);

        $user->syncRoles($request->input('roles.*.name'));
        $user->syncPermissions($request->input('permissions.*.name'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // Desactiva las marcas de tiempo en el modelo User
        $user->timestamps = false;
        $user->save();

        // Actualiza la columna 'nombre_usuario' en la tabla registros
        DB::table('registros')->where('usuario_id', $user->id)->update(['nombre_usuario' => $user->name]);

        // Elimina el usuario sin actualizar las marcas de tiempo
        $user->delete();

        return to_route('users.index');
    }
}
