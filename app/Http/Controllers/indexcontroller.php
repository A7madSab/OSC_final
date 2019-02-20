<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Category;
use App\Comment;
use Auth;
use App\User;
//use Egulias\EmailValidator\Warning\Comment;

class indexcontroller extends Controller
{
  public function comment($id)
  {
    $posts = Post::all();
    $post = $posts->where('post_id', $id);
    $cat = Category::all();
    $comments = Comment::all();
    $comment = $comments->where('post_id', $id);
    return view("comment")->with("posts", $post)->with('cats', $cat)->with("comments", $comment);
  }


  public function welcome()
  {
    return view("welcome");
  }

  public function index()
  {
    $post = Post::all()->sortByDesc('created_at');
    $cat = Category::all();
    return view("index")->with("posts", $post)->with('cats', $cat);
  }

  public function userprofile($id)
  {
    $tempuser = User::all();
    $user = $tempuser->find($id);
    return view('userprofile')->with("user", $user);
  }

  public function university()
  {
    return view("university");
  }

  public function makecomments($id, Request $request)
  {

    $comment = new Comment;
    $comment->body = $request->input('body');
    $comment->post_id = $id;
    $comment->save();

    $comentid = $request->input('id');

    return redirect()->action(
      'indexcontroller@comment',
      ['id' => $comentid]
    );
  }


  public function create(Request $request)
  {


    $body = $request->body;
    $title = $request->title;
    $author = Auth::user()->name;
    $image = $request->imgefile;

    $photoName = time() . '.' . $request->imgefile->getClientOriginalExtension();
    $request->imgefile->move(public_path('imgs'), $photoName);

    $post = new Post();
    $post->auther = $author;
    $post->title = $title;
    $post->body = $body;
    $post->User_id = auth()->user()->id;
    $post->category_id = 1;
    $post->comment_count = 2;
    $post->image = "imgs/" . $photoName;
    $post->save();



    $post = Post::all();
    $cat = Category::all();
    return view("index")->with("posts", $post)->with('cats', $cat);
  }

  public function search(Request $request)
  {


    $posts = Post::all();
    $post = $posts->where('title', $request->searchval);
    $cat = Category::all();
    return view("comment")->with("posts", $post)->with('cats', $cat);
  }


  public function searchcat($name)
  {
    $name = strtolower($name);
    $posts = Post::all();
    $post = $posts->where('title', $name);
    $cat = Category::all();
    return view("comment")->with("posts", $post)->with('cats', $cat);
  }
}
