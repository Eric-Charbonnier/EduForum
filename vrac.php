<?php

public function store(Request $request)
{
  $request->validate([
    'title' => 'sometimes|max:255',
    'title_fr' => 'sometimes|max:255',
    'body' => 'sometimes',
    'body_fr' => 'sometimes',
    'user_id' => 'required|exists:users,id',
  ]);

  $title = $request->title_fr ?? $request->title;
  $body = $request->body_fr ?? $request->body;

  $newPost = ForumPost::create([
    'title' => $title,
    'body' => $body,
    'user_id' => Auth::user()->id,
    'date' => now()
  ]);

  return redirect()->route('forum.index')->with('success', 'Le post a été créé avec succès.');
}




php artisan make:controller LocalizationController



            public function index($locale) {
                App::setLocale($locale);
                session()->put('locale', $locale);
                return redirect()->back();
            }
            
            
            php artisan make:middleware Localization
            
            
            Dans la fonction handle :             
            
        if(session()->has('locale')){
            App::setLocale(session()->get('locale'));
        }
        return $next($request);
        
        
        
        Dans kernel.php : 
       Dans protected $middlewareGroups = [
        'web' => [
            Ajouter : \App\Http\Middleware\Localization::class,


