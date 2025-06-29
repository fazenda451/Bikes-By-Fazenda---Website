<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Garantir que as sessões estão a funcionar
        if (!Session::isStarted()) {
            Session::start();
        }

        // Adicionar variáveis globais para as views
        view()->share('hasNotifications', 
            Session::has('success') || 
            Session::has('error') || 
            Session::has('warning') || 
            Session::has('info') ||
            Session::has('notification_type')
        );

        $response = $next($request);

        // Se for uma resposta de redirecionamento, garantir que as notificações são mantidas
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            // As notificações já devem estar na sessão via with()
            // Mas vamos garantir que não são perdidas
            if (Session::has('success')) {
                $response->with('success', Session::get('success'));
            }
            if (Session::has('error')) {
                $response->with('error', Session::get('error'));
            }
            if (Session::has('warning')) {
                $response->with('warning', Session::get('warning'));
            }
            if (Session::has('info')) {
                $response->with('info', Session::get('info'));
            }
            if (Session::has('notification_type') && Session::has('notification_message')) {
                $response->with('notification_type', Session::get('notification_type'))
                         ->with('notification_message', Session::get('notification_message'));
            }
        }

        return $response;
    }
} 