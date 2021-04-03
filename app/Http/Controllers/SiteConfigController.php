<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteConfigEditRequest;
use App\Http\Requests\SiteConfigUpdateRequest;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteConfigController extends Controller
{
    public function edit(SiteConfigEditRequest $request, $id)
    {
        $item = SiteConfig::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }
        return view('admin.site-config.edit', [
            'title'     => 'Site Config',
            'id'        => $id,
            'item'      => $item,
        ]);
    }

    public function update(SiteConfigUpdateRequest $request, $id)
    {
        $item = SiteConfig::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        $params = $request->only([
            'facebook',
            'twitter',
            'google',
            'github',
            'policy',
            'about',
            'email',
            'phone',
            'address',
            'contact_message',
        ]);

        if($request->has('logo'))
        {
            if(\Storage::disk('local')->exists($item->logo))
            {
                Storage::delete($item->logo);
            }

            $params['logo'] = Storage::putFile('site', $request->file('logo'));
        }else{
            $params['logo'] = $item->logo;
        }

        $item->fill($params)->save();

        return redirect()->route('admin.site-config.edit', $id)->with("success", "Successfully Updated");
    }
}
