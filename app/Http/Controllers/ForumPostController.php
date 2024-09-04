<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ForumPostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $forumPosts = ForumPost::all();
    $forumPosts = ForumPost::select()
      ->paginate(20);
    return view('forum.index', ['forumPosts' => $forumPosts]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('forum.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required_without:title_fr|max:255',
      'title_fr' => 'required_without:title|max:255',
      'body' => 'required_without:body_fr',
      'body_fr' => 'required_without:body',
    ]);

    $title = ($request->title) ? $request->title : "";
    $body = ($request->body) ? $request->body : "";
    $title_fr = ($request->title_fr) ? $request->title_fr : "";
    $body_fr = ($request->body_fr) ? $request->body_fr : "";

    $newPost = ForumPost::create([
      'title' => $title,
      'body' => $body,
      'title_fr' => $title_fr,
      'body_fr' => $body_fr,
      'user_id' => Auth::user()->id,
      'date' => Carbon::now(),
    ]);

    return redirect()->route('forum.index')->with('success', 'Le post a été créé avec succès.');
  }



  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ForumPost  $forumPost
   * @return \Illuminate\Http\Response
   */
  public function show(ForumPost $forumPost)
  {
    return view('forum.show', ['forumPost' => $forumPost]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ForumPost  $forumPost
   * @return \Illuminate\Http\Response
   */
  public function edit(ForumPost $forumPost)
  {
    return view('forum.edit', ['forumPost' => $forumPost]);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ForumPost  $forumPost
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required_without:title_fr|max:255',
      'title_fr' => 'required_without:title|max:255',
      'body' => 'required_without:body_fr',
      'body_fr' => 'required_without:body',
    ]);

    $forumPost = ForumPost::findOrFail($id);

    $forumPost->title = $request['title'];
    $forumPost->body = $request['body'];
    $forumPost->title_fr = $request['title_fr'];
    $forumPost->body_fr = $request['body_fr'] ?? '';
    $forumPost->save();
    return redirect()->route('forum.show', $forumPost->id)->with('success', 'Le post a été mis à jour avec succès.');
  }

  
  public function destroy(ForumPost $forumPost)
  {
    $forumPost->delete();
    return redirect()->route('forum.index')->with('success', 'Le post a été supprimé avec succès.');
  }
}
