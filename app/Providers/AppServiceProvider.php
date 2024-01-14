<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View composer for layouts.newhead
        View::composer('layouts.newhead', function ($view) {
            $this->shareCartCount($view);
        });

        // View composer for layouts.otherhead
        View::composer('layouts.newheader', function ($view) {
            $this->shareCartCount($view);
        });
    }

    /**
     * Share cart count with the view.
     *
     * @param  \Illuminate\Contracts\View\View  $view
     * @return void
     */
    private function shareCartCount($view)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartCount = Wishlist::where('guest_id', $user->id)->count();
            $view->with('cartCount', $cartCount);
        } else {
            $view->with('cartCount', 0);
        }
    }
}
