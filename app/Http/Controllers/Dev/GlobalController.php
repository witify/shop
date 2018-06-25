<?php

namespace App\Http\Controllers\Dev;

use App\GlobalModel;
use App\Http\Requests\GlobalRequest;

class GlobalController extends DevController
{
    /**
     * Edit a global
     *
     * @return View
     */
    public function edit(GlobalModel $global)
    {
        return view('app.dev.global.edit', compact('global'));
    }

    /**
     * Update a global
     *
     * @return \Illuminate\Http\Response
     */
    public function update(GlobalRequest $request, GlobalModel $global)
    {
        $global->update($request->all());
        flash('Globals successfully updated', 'success');
        return $this->json()->redirect('/dev');
    }
}
