<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserSharedResource;
use App\Models\Registro;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $today = now()->toDateString();
        return array_merge(parent::share($request), [
            'auth.user' => fn () => $request->user()
                ? new UserSharedResource($request->user())
                : null,
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'registros_data' => [
                'registrosTotales' => Registro::count(),
                'registrosHoy' => Registro::whereDate('created_at', $today)->count(),
                'registrosActuales' => Registro::whereNull('updated_at')->count(),
                'adminTotal' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 1)
                    ->count(),
                'adminHoy' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 1)
                    ->whereDate('registros.created_at', $today)
                    ->count(),
                'puertaTotal' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 2)
                    ->count(),
                'puertaHoy' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 2)
                    ->whereDate('registros.created_at', $today)
                    ->count(),
                'secretariaTotal' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 3)
                    ->count(),
                'secretariaHoy' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 3)
                    ->whereDate('registros.created_at', $today)
                    ->count(),
                'tesoreriaTotal' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 4)
                    ->count(),
                'tesoreriaHoy' => Registro::join('users', 'registros.usuario_id', '=', 'users.id')
                    ->where('users.oficina_id', 4)
                    ->whereDate('registros.created_at', $today)
                    ->count(),
            ],
        ]);
    }
}
