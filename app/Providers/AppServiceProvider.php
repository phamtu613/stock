<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Footer;
use App\Models\InfoStock;
use App\Models\PostAdvisoryInvest;

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
        $infoStock = InfoStock::find(1);
        $footer = Footer::find(1);

        $postAdvisoryInvests = PostAdvisoryInvest::orderBy('id', 'ASC')->get();
        view()->share(['infoStock' => $infoStock, 'footer' => $footer, 'postAdvisoryInvests' => $postAdvisoryInvests]);
    }
}
