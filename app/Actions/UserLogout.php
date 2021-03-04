<?php
namespace App\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserLogout extends BaseAction
{

    /**
     * @return RedirectResponse
     */
    public function handle(): RedirectResponse
    {
        Auth::guard('landlord')->logout();

        return redirect('/');
    }

}
