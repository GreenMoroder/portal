<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consumer;

use App\Models\Area;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsumersExport;
use App\Imports\ConsumersImport;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumers = Consumer::paginate(10);
        return view('admin.consumer.index', compact('consumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::pluck('name', 'id')->all();
        return view('admin.consumer.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumers = Consumer::where('area_id', $id)->paginate(10);
        return view('admin.consumer.index', compact('consumers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumer = Consumer::find($id);
        return view('admin.consumer.edit', compact('consumer'));
    }

    /**`
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'crawl_date' => 'nullable',
            'year_release' => 'nullable',
            'reading' => 'nullable',
            'note' => 'nullable',
            'photo' => 'nullable|image'
        ]);
        $consumer = Consumer::find($id);
        $data = $request->all();
        $data['photo'] = Consumer::uploadPhoto($request, $consumer->photo);
        $consumer->update($data);
        return redirect()->route('consumers.index')->with('success', 'Данные сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ConsumersExport, 'consumers.xlsx');
    }

    public function import(Request $request)
    {
        $id = $request->category_id;
        $file = $request->file('file')->store('import');
        ini_set('memory_limit', '-1');
        Excel::import(new ConsumersImport($id), $file);
        return redirect()->route('consumers.index')->with('success', 'Файл импортирован');
    }
}
