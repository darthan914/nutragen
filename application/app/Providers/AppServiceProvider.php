<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Page;
use App\Models\Ecommerce;
use App\Models\Advertisment;

use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(!Request::is('admin/*'))
        {
            $global = Page::where('page', 'GLOBAL')->get();
            $ecommerce = Ecommerce::all();
            $advertisment = Advertisment::where('flag_publish', 1)->inRandomOrder()->first();

            $data_global = array();
            foreach ($global as $list) {
                eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                $data_global[] = [$list->for];
            }
            view()->share(compact($data_global, 'ecommerce', 'advertisment'));

            if(Request::is('/') || Request::is('home'))
            {
                $home = Page::where('page', 'HOME')->get();

                $data_home = array();
                foreach ($home as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_home[] = [$list->for];
                }
                view()->share(compact($data_home));
            }

            if(Request::is('about'))
            {
                $about = Page::where('page', 'ABOUT')->get();

                $data_about = array();
                foreach ($about as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_about[] = [$list->for];
                }
                view()->share(compact($data_about));
            }

            if(Request::is('product'))
            {
                $product = Page::where('page', 'PRODUCT')->get();

                $data_product = array();
                foreach ($product as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_product[] = [$list->for];
                }
                view()->share(compact($data_product));
            }

            if(Request::is('distribution'))
            {
                $distribution = Page::where('page', 'DISTRIBUTION')->get();

                $data_distribution = array();
                foreach ($distribution as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_distribution[] = [$list->for];
                }
                view()->share(compact($data_distribution));
            }

            if(Request::is('service'))
            {
                $service = Page::where('page', 'SERVICE')->get();

                $data_service = array();
                foreach ($service as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_service[] = [$list->for];
                }
                view()->share(compact($data_service));
            }

            if(Request::is('news'))
            {
                $news = Page::where('page', 'NEWS')->get();

                $data_news = array();
                foreach ($news as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_news[] = [$list->for];
                }
                view()->share(compact($data_news));
            }

            if(Request::is('contact'))
            {
                $contact = Page::where('page', 'CONTACT')->get();

                $data_contact = array();
                foreach ($contact as $list) {
                    eval("\$".$list->for." = App\Models\Page::find(".$list->id.");");
                    $data_contact[] = [$list->for];
                }
                view()->share(compact($data_contact));
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
