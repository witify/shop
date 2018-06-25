<?php

namespace App\Http\Controllers\Admin;

use App\GlobalModel;
use App\Http\Requests\GlobalRequest;

class GlobalController extends AdminController
{
    /**
     * Edit a page
     *
     * @return View
     */
    public function edit(GlobalModel $global)
    {
        return view('app.admin.global.edit', compact('global'));
    }

    /**
     * Update a page
     *
     * @return \Illuminate\Http\Response
     */
    public function update(GlobalRequest $request, GlobalModel $global)
    {
        $global->update($request->all());
        flash('Globals successfully updated', 'success');
        return $this->json()->redirect('/admin/global/1/edit');
    }
}
