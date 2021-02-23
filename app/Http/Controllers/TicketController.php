<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $ticketQuery = Ticket::query();

        $ticketQuery->when($request->agent, function(Builder $query) use ($request){
            $query->whereHas('agent', fn ($subQuery) => $subQuery->where('name', $request->agent));
        });

        $ticketQuery->when($request->group, function(Builder $query) use ($request){
            $query->whereHas('group', fn ($subQuery) => $subQuery->where('name', $request->group));
        });

        $ticketQuery->when($request->status, fn(Builder $query) => $query->where('status', $request->status));
        $ticketQuery->when($request->priority, fn(Builder $query) => $query->where('priority', $request->priority));
        $ticketQuery->when($request->type, fn(Builder $query) => $query->where('type', $request->type));
        $ticketQuery->when($request->source, fn(Builder $query) => $query->where('source', $request->source));

        $ticketQuery->when($request->tags, function(Builder $query) use ($request) {
            $tags = explode(',', $request->tags);

            foreach ($tags as $tag) {
                $query->where('tags', 'LIKE', "%{$tag}%");
            }
        });

        $ticketQuery->when($request->company, function(Builder $query) use ($request) {
            $query->whereHas('contact.companies', fn ($subQuery) => $subQuery->where('name', $request->company));
        });

        $ticketQuery->when($request->contact, function(Builder $query) use ($request) {
            $query->whereHas('contact', fn ($subQuery) => $subQuery->where('name', $request->contact));
        });

        $tickets = $ticketQuery->with(['contact.companies', 'agent', 'group'])->get();

        return response($tickets);
    }
}
