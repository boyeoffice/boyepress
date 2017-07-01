<?php

namespace Boye\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Repositories\UserRepository;
use Boye\Repositories\VisitorRepository;
use Boye\Repositories\CategoryRepository;
use Boye\Repositories\CommentRepository;
use Boye\Repositories\PostRepository;

class Dashboard extends Controller
{
	protected $user;
	protected $visitor;
	protected $category;
	protected $comment;
	protected $post;

	public function __construct(
		UserRepository $user,
		VisitorRepository $visitor,
		CategoryRepository $category,
		CommentRepository $comment,
		PostRepository $post)
	{
         $this->user = $user;
         $this->visitor = $visitor;
         $this->category = $category;
         $this->comment = $comment;
         $this->post = $post;
	}
	public function statistics()
	{
		$users = $this->user->getNumber();
		$visitor = $this->visitor->getNumber();
		$category = $this->category->getNumber();
		$comment = $this->comment->getNumber();
		$posts = $this->post->getNumber();
		$data = compact(['users','visitor','category', 'comment', 'posts']);
		return response()->json($data);
	}
    public function getIndex()
    {
    	return view('dashboard');
    }
}
