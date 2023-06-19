<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use App\Models\OrderInfo;

class PrivilegeCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Check if the user is the super admin
        if ($user && $user->role == 1) {
            return $next($request);
        }

        $userId = $user->id;
        $valid_user = OrderInfo::where('customer_id', $userId)
            ->where('status', 'Paid')
            ->with('package')
            ->whereHas('package', function ($query) {
                $query->where('validity', '>', 0);
            })
            ->orderBy('created_at', 'desc')
            ->first();

        $privilege_user = false;
        if ($valid_user) {
            $expiryDate = Carbon::parse($valid_user->created_at)->addMonths($valid_user->package->validity);
            $privilege_user = $expiryDate->greaterThanOrEqualTo(Carbon::now());
        }

        if ($privilege_user) {
            return $next($request);
        }

        // If the user is not valid, redirect them back to the dashboard
        return redirect()->to('/admin/dashboard')->with('error', 'Unauthorized');
    }
}
