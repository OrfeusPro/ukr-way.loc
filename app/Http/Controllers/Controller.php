<?php

namespace App\Http\Controllers;

use App\Models\Tel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	protected $title;  //title
	protected $meta_desc;  //meta_desc
	protected $keywords;  //keywords
	protected $request;  //request

	protected $template; //Шаблон
	protected $vars = array(); //масив переменных передаваемые шаблону

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	
	protected function renderOutput()
	{
		$tels = Tel::all();

		$this->vars = Arr::add($this->vars, 'title', setting('site.description'));
		$this->vars = Arr::add($this->vars, 'meta_desc', $this->meta_desc);
		$this->vars = Arr::add($this->vars, 'tels', $tels);
		$this->vars = Arr::add($this->vars, 'request', $this->request);

		return view($this->template)->with($this->vars);
	}
	
}
