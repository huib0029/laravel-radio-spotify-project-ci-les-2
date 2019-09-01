<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Internetradiostations;

class InternetRadioStationsController extends Controller
{
    // Beveiliging
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internetradiostations = Internetradiostations::paginate(5);
        return view('internetradiostationseditor.index',
            compact('internetradiostations'))
            ->with('i', (request()->input('page', 1) -1 ) *5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $iscreate = true;
        return view('internetradiostationseditor.create', compact('iscreate'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'url' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request['logo'] === null) {
            Internetradiostations::create($request->all());
            return redirect()->route('internetradiostationseditor.index')
                ->with('success','Internet radio station aangemaakt');
        } else {
            $input['logo'] = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $input['logo']);


            $input['title'] = $request->title;
            $input['url'] = $request->url;
            Internetradiostations::create($input);
            return redirect()->route('internetradiostationseditor.index')
                ->with('success','Internet radio station aangemaakt');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iscreate = false;
        $internetradiostation = Internetradiostations::find($id);
        return view('internetradiostationseditor.edit',
            compact('internetradiostation'),
            compact('iscreate'));
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
        request()->validate([
            'title' => 'required',
            'url' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($request['logo'] === null) {
        Internetradiostations::find($id)->update($request->all());
        return redirect()->route('internetradiostationseditor.index')
            ->with('success','Internet radio station ge-updated');
        } else {
            $input['logo'] = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $input['logo']);

            $input['title'] = $request->title;
            $input['url'] = $request->url;
            Internetradiostations::find($id)->update($input);
            return redirect()->route('internetradiostationseditor.index')
                ->with('success','Internet radio station ge-updated');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Internetradiostations::find($id)->delete();
        return redirect()->route('internetradiostationseditor.index')
            ->with('success','Internet radio station verwijderd');
    }
}
