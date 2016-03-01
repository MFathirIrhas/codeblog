<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;


use App\Jobs\ChangeLocale;

class HomeController extends Controller
{
	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_gestion;

	/**
	 * The UserRepository instance.
	 *
	 * @var App\Repositories\UserRepository
	 */
	protected $user_gestion;

	/**
	 * The pagination number.
	 *
	 * @var int
	 */
	protected $nbrPages;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\BlogRepository $blog_gestion
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return void
	*/
	public function __construct(
		BlogRepository $blog_gestion,
		UserRepository $user_gestion)
	{
		$this->user_gestion = $user_gestion;
		$this->blog_gestion = $blog_gestion;
		$this->nbrPages = 3;

		// $this->middleware('redac', ['except' => ['indexFront', 'show', 'tag', 'search']]);
		// $this->middleware('admin', ['only' => 'updateSeen']);
		// $this->middleware('ajax', ['only' => ['updateSeen', 'updateActive']]);
	}


	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->blog_gestion->indexFront($this->nbrPages);
		$links = $posts->render();

		return view('front.index', compact('posts', 'links'));
		// return view('front.index');
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocale
	 * @param  String $lang
	 * @return Response
	 */
	public function language( $lang,
		ChangeLocale $changeLocale)
	{		
		$lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
		$changeLocale->lang = $lang;
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
