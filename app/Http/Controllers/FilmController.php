<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
//php artisan make:controller FilmController --resource
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {


        //le but depuis une categorie on cherche ma miste de c films
        //1 selection de la categorie// oops on a pas le id donc on doit cherché vec le slug
        // etape 1 ==Category::where('slug',$slug)->get()[0]
        //etape 1== select le premier enregistrement de la requete  select * from categories where slug = $slug
        // etape 1  == Category::where('slug',$slug)->first() car    ->get()[0] == ->first()
        // une fois qu'on a recuperer la category on peut utiliser la methode films() creer dans le model Category
        // Category::where('slug',$slug)->first()->films()->get() 
        //elle retourne la liste des film de la categorie trouvé dans l'etape 1
        $films = $slug  ? Category::where('slug', $slug)->first()->films()->get() : Film::all();



        $categories = Category::all();
        return view('index', compact('films', 'categories', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $actors = Actor::all();
        return view('create', compact('categories', "actors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'year' => ['required', 'numeric', 'min:1950', 'max:' . date('Y')],
            'description' => ['required', 'string', 'max:500'],
        ]);
        //dd($request->all());
        $film = Film::create($request->all());
        //attach permet d'atacher le filme creer avec les actors selectioner dans le formulaire 
        //attach accepte tjr un tableau de ids
        $film->actors()->attach($request->actors);
        return redirect()->route('films.index')->with('info', 'Le film a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        // $actors=$film->actors()->get();
        //$film->with('actors')->get();

        return view('show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $categories = Category::all();
        $actors = Actor::all();

        return view('edit', compact('film', 'categories', "actors"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100'],
            'year' => ['required', 'numeric', 'min:1950', 'max:' . date('Y')],
            'description' => ['required', 'string', 'max:500'],
        ]);

        $film->update($request->all());
        // sync est lequivalent de detach puis attach
        //voir detach dans destroy
        $film->actors()->sync($request->actors);
        return redirect()->route('films.index')->with('info', 'Le film a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {   
        //detach() elle permet de suprimer dans la table associative les enregistrement relier au film selectioné
        $film->actors()->detach();
        $film->delete();
        return back()->with('info', "le film a bien étét supprimé");
    }
}
