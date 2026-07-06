<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::latest();

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $leads = $query->paginate(20)->withQueryString();

        $stats = [
            'total'     => Lead::count(),
            'new'       => Lead::where('status', 'new')->count(),
            'contacted' => Lead::where('status', 'contacted')->count(),
            'closed'    => Lead::where('status', 'closed')->count(),
        ];

        return view('admin.leads.index', compact('leads', 'stats'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => ['required', 'in:new,contacted,closed'],
        ]);

        $lead->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status atualizado.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->back()->with('success', 'Lead removido.');
    }
}
