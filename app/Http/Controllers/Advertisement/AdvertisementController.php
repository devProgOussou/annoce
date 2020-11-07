<?php

namespace App\Http\Controllers\Advertisement;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::with('user')->where('user_id', Auth::user()->id)->get();
        return Inertia::render('Advertisements/Index', [
            'advertisements' => $advertisements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Advertisements/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advertisement = new Advertisement();
        $advertisement->name = $request->input('name');
        $advertisement->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $advertisement->image = $filename;
        } else {
            return back();
        }
        $advertisement->user_id = Auth::user()->id;
        $advertisement->save();
        return redirect()->route('advertisements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisements = Advertisement::all()->where('id', $id);
        return Inertia::render('Advertisements/Show', [
            'advertisements' => $advertisements
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }

    /**
     * Deactivate the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        DB::update("UPDATE advertisements SET is_available = 0 WHERE id = $id");
        return redirect()->route('advertisements.index');
    }

    /**
     * Activate the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        DB::update("UPDATE advertisements SET is_available = 1 WHERE id = $id");
        return redirect()->route('advertisements.index');
    }
}
