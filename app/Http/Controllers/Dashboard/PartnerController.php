<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use PhotoTrait;
    public function index()
    {
        $partners = Partner::orderBy('id')->get();
        return view('dashboard.partner.crud', compact('partners'));
    }
    public function store(Request $request)
    {
        $logo = $this->videoSave($request->file('logo'), 'img/partner_logo');

        Partner::create([
            'logo' => $logo
        ]);


        return back();
    }

    public function update(Request $request, $id)
    {
        if (is_file(public_path(Partner::find($id)->logo))){
            unlink(public_path() . Partner::find($id)->logo);
        }
        $logo = $this->videoSave($request->file('logo'), 'img/partner_logo');

        Partner::find($id)->update([
            'logo' => $logo
        ]);
        return back();
    }
    public function destroy($id)
    {
        if (is_file(public_path(Partner::find($id)->logo))){
            unlink(public_path() . Partner::find($id)->logo);
        }
        Partner::find($id)->delete();

        return back();
    }
}
