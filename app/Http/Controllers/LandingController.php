<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadFormRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function submit(LeadFormRequest $request)
    {
        $lead = Lead::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'problem'    => $request->problem,
            'ip_address' => $request->ip(),
        ]);

        Mail::to(config('mail.from.address'))->send(new LeadReceived($lead));

        return redirect()->back()
            ->with('success', 'Recebemos seu contato! Nossa equipe entrará em contato em breve.');
    }
}
