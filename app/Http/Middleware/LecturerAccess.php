<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class LecturerAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $lecturerId = $request->route('lecturer');

        if (!$user->canViewLecturer($lecturerId)) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
} 