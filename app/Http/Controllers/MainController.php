<?php

namespace App\Http\Controllers;

use App\Models\Tel;
use App\Models\Route;
use App\Models\Slider;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use App\Models\Page;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{

    public function __construct()
    {
        $this->template = env('THEME_RESOURCES') . '.index';
    }

    public function index()
    {
        //$content = '';
        $sliders = Slider::all()->translate(App::getLocale(), 'ru');
        $routes = Route::where("is_show", 1)->where('main', 1)->orderBy('sort', 'asc')->get();
        $dist_r_from = Route::select('r_from')->where("is_show", 1)->distinct()->get();
        $dist_r_to = Route::select('r_to')->where("is_show", 1)->distinct()->get();

        $main_forma = view(env('THEME_RESOURCES') . '.parts.main_forma')
            ->with('dist_r_from', $dist_r_from)
            ->with('dist_r_to', $dist_r_to)
            ->render();
        $benefits = view(env('THEME_RESOURCES') . '.parts.benefits')->render();
        $GlobalSetting = GlobalSetting::first();
        $main_content = view(env('THEME_RESOURCES') . '.parts.main_content')
            ->with('GlobalSetting', $GlobalSetting)
            ->render();
        $routes = view(env('THEME_RESOURCES') . '.parts.route')
            ->with("title", "ПОПУЛЯРНІ МАРШРУТИ")
            ->with('routes', $routes)->render();
        $content = $main_forma . $routes . $benefits . $main_content;

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'slider', $sliders);
        $this->vars = Arr::add($this->vars, 'title', setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', setting('site.description'));
        return $this->renderOutput();
    }


    public function country($slug, Request $request)
    {
        $country = Country::where('alias', $slug)->first();
        $routes = $country->marshrut()->where("is_show", 1)->orderBy('sort', 'asc')->get();

        $routes = view(env('THEME_RESOURCES') . '.parts.route')
            ->with("country", $country)
            ->with('routes', $routes)->render();
        $content = $routes;

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'title', $country->meta_title ? $country->meta_title : $country->title . " | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', $country->meta_desc ? $country->meta_desc : setting('site.description'));
        return $this->renderOutput();
    }

    public function mroute($slug, Request $request)
    {
        $GlobalSetting = GlobalSetting::first();

        $route = Route::where('alias', $slug)->orderBy('sort', 'asc')->first();
        $benefits = view(env('THEME_RESOURCES') . '.parts.benefits')->render();

        $routes = view(env('THEME_RESOURCES') . '.parts.route_single')
            ->with('GlobalSetting', $GlobalSetting)
            ->with('benefits', $benefits)
            ->with('route', $route)->render();

        $content = $routes;

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'title', $route->meta_title ? $route->meta_title : "Маршрутка " . $route->title . " | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', $route->meta_desc ? $route->meta_desc : "Маршрутка " . $route->title . " - " . setting('site.description'));
        return $this->renderOutput();
    }

    public function country_all(Request $request)
    {
        $countries = Country::orderBy('sort', 'asc')->get();

        $routes = view(env('THEME_RESOURCES') . '.parts.country_all')
            ->with("countries", $countries)
            ->render();
        $content = $routes;

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'title', "Всі маршрути | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', "Всі маршрути | " . setting('site.description'));
        return $this->renderOutput();
    }

    public function contacts(Request $request)
    {
        $tels = Tel::all();
        $content = view(env('THEME_RESOURCES') . '.layouts.contacts')
            ->with("tels", $tels)
            ->render();

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'title', "Контакти | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', "Контакти | " . setting('site.description'));
        return $this->renderOutput();
    }


    public function thanks(Request $request)
    {
        $tels = Tel::all();
        $content = view(env('THEME_RESOURCES') . '.layouts.thanks')
            ->render();

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'title', "Дякую | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', "Дякую - " . setting('site.description'));
        return $this->renderOutput();
    }

    public function about_us(Request $request)
    {
        // $tels = Tel::all();
        $page = Page::where("alias", "pro-nas")->first();

        $content = view(env('THEME_RESOURCES') . '.layouts.about')
            ->with('page', $page)
            ->render();

        $benefits = view(env('THEME_RESOURCES') . '.parts.benefits')->render();

        $content = $content . $benefits;

        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->vars = Arr::add($this->vars, 'title', $page->meta_title ? $page->meta_title : "Про нас | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', $page->meta_desc ? $page->meta_desc : setting('site.description'));
        return $this->renderOutput();
    }




    public function form_process(Request $request)
    {
        $name_user = $_POST["name_user"];
        $tel_user = $_POST["tel_user"];
        $otkuda = $_POST["otkuda"];
        $kuda = $_POST["kuda"];
        $nowdate = $_POST["nowdate"];
        $msg = $_POST["message"];

        $html = "Content-type: text/html; charset=utf-8\n";
        $mailto   = env("CLIENT_MAIL"); // Enter your mail addres here. 
        $name_user     = ucwords($name_user);
        $subject  = "Заявка з сайта " . ucwords($name_user); // Enter the subject here.

        $message = "";
        if ($name_user) {
            $message = "Имя: " . $name_user . "<br>";
        }

        if ($tel_user) {
            $message .= "Телефон: " . $tel_user . "<br>";
        }

        if ($otkuda) {
            $message .= "Откуда: " . $otkuda . "<br>";
        }

        if ($kuda) {
            $message .= "Куда: " . $kuda . "<br>";
        }

        if ($nowdate) {
            $message .= "Дата поездки: " . $nowdate . "<br>";
        }

        if ($msg) {
            $message .= "Сообщение: " . $msg;
        }

        $email_message = trim(stripslashes($message));
        $success = mail($mailto, $subject, $email_message, $html . "From: \"info@ukr-way.com.ua\" <info@ukr-way.com.ua>\nReply-To: \"" . ucwords($tel_user) . "\" <info@ukr-way.com.ua>\nX-Mailer: PHP/" . phpversion());

        if ($success) {
            return "success";
        } else {
            echo "invalid";
        }
        // return 1;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
