<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsefulLinkRequest;
use App\Models\UsefulLink;
use App\Services\IframeService;
use App\Services\ParserService;


class UsefulLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = UsefulLink::all();

        return view('cabinet.pages.links',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsefulLinkRequest $request)
    {
        $validate = $request->validated();

        $url = $validate['link'];

        $linkData = IframeService::getData($url);

        $data['link'] = $url;

        $data['screen'] = $linkData['thumbnail_url'];

        $validate['title'] ? $data['title'] = $validate['title'] : $data['title'] = $linkData['title'];

        $validate['description'] ? $data['description'] = $validate['description'] : $data['description'] = $linkData['description'];

        // Создание записи в базе данных
        UsefulLink::create($data);

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $link = UsefulLink::query()->find($id);

        return view('cabinet.pages.linkform',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsefulLinkRequest $request, string $id)
    {
        $link = UsefulLink::query()->find($id);

        $link->update($request->validated());

        return redirect()->route('cabinet-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = UsefulLink::query()->find($id);

        $link->delete();

        return redirect()->route('cabinet-links.index');
    }
}
