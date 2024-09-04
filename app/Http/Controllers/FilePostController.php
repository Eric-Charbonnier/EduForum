<?php

namespace App\Http\Controllers;

use App\Models\FilePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FilePostController extends Controller
{
  public function index()
  {
    // $filePosts = FilePost::paginate(10);

    // return view('filepost.index', compact('filePosts'));
    $filePosts = FilePost::all();
    $filePosts = FilePost::select()
      ->paginate(20);
    return view('files.index', ['filePosts' => $filePosts]);
  }

  public function create()
  {
    return view('files.create');
  }

  public function store(Request $request)
  {
      $request->validate([
          'title_fr' => 'required_without:title_en|max:255',
          'title_en' => 'required_without:title_fr|max:255',
          'file' => 'required|file'
      ]);
  
      $file = $request->file('file');
      $filename = $file->getClientOriginalName();
      $file->move(public_path('files'), $filename);
  
      $filePost = new FilePost();
      $filePost->title_fr = $request->input('title_fr');
      $filePost->title_en = $request->input('title_en');
      $filePost->users_id = (Auth::user()) ? Auth::user()->id : null;
      $filePost->filename = $filename;
      $filePost->save();
  
      return redirect()->route('files.index')->with('success', 'Le fichier a été enregistré avec succès.');
  }

    /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ForumPost  $forumPost
   * @return \Illuminate\Http\Response
   */
  public function edit(FilePost $filePost)
  {
    return view('files.edit', ['filePost' => $filePost]);
  }
  

  public function update(Request $request, FilePost $filePost)
  {
      $request->validate([
          'title_fr' => 'required|string|max:255',
          'title_en' => 'required|string|max:255',
          'file' => 'nullable|mimes:pdf|max:10240'
      ]);
  
      if ($request->hasFile('file')) {
          $destinationPath = public_path('files');
          $file = $request->file('file');
          $filename = uniqid() . '.' . $file->getClientOriginalExtension();
          $file->move($destinationPath, $filename);
  
          $oldFile = $filePost->filename;
          $filePost->filename = $filename;
          $filePost->title_fr = $request->input('title_fr');
          $filePost->title_en = $request->input('title_en');
          $filePost->save();
  
          if ($oldFile) {
              unlink(public_path('files/' . $oldFile));
          }
      } else {
          $filePost->title_fr = $request->input('title_fr');
          $filePost->title_en = $request->input('title_en');
          $filePost->save();
      }
  
      return redirect()->route('files.index')->with('success', 'Le fichier a été mis à jour avec succès.');
  }
  



  public function destroy(FilePost $filePost)
  {
    Storage::delete('public/files/' . $filePost->filename);

    $filePost->delete();

    return redirect()->route('dashboard')->with('success', 'Le fichier a été supprimé avec succès.');
  }
}
