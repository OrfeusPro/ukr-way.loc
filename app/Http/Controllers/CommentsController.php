<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;


class CommentsController extends Controller
{

	public function __construct(Request $request) {
		$this->request = $request;		
		$this->template = env('THEME').'.index';
	}
	
	
	public function index()
    {
		$sliders = '';

		$contents=DB::table('comments')->where('parent', 0)->where('moderated', 1)->orderBy('created_at', 'desc')->get()->toArray();
		
		$m = array();
		$i=0;

		foreach($contents as $item)
		{
			$i++;
			$m[$i] = $item;
			$sub_comments = DB::table('comments')->where('parent', $item->id)->get();
			$m[$i]->sub_comments = $sub_comments;
		}
		
		$comments=$m;
		
		$content = view(env('THEME').'.comments.comments')->with('comments', $comments)->render();
        $this->vars = Arr::add($this->vars, 'title', "Відгуки | " . setting('site.title'));
        $this->vars = Arr::add($this->vars, 'meta_desc', setting('site.description'));
		$this->vars = Arr::add($this->vars, 'content', $content);
	

		return $this->renderOutput();
	}
	
    public function store(Request $request)
    {
		DB::table('comments')->insert([
				'title' => $request->title ? $request->title : '',
				'parent' => 0,
				'text' => $request->text ? $request->text : '',
				'email' => $request->email ? $request->email : '',
				'created_at' => date("Y-m-d H:i:s"),
				'moderated' => 0,
		]);

		return back();
    }
	
}
