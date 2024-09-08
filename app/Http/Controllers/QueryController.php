<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use Illuminate\Support\Facades\Auth;


class QueryController extends Controller
{
    public function index()
    {
        $queries = Query::where('user_id', Auth::id())->get();

        return view('queries.index', compact('queries'));
    }

    
    public function edit($id){
        $queries = Query::findOrFail($id);
        return view('queries.edit',compact('queries'));
    }

    // public function show(Query $query)
    // {
    //     $this->authorize('view', $query);

    //     return view('queries.show', compact('query'));
    // }

    public function update(Request $request, $id)
    {
        // $this->authorize('update', $query);

        // $validatedData = $request->validate([
        //     'query' => 'required|string',
        //     'status' => 'required|string|in:pending,resolved',
        // ]);

        // $query->update($validatedData);

        return redirect()->route('queries.index')->with('success', 'Query updated successfully.');
    }

    public function destroy($id)
    {
        $queries=Query::findOrFail($id);

        $queries->delete();

        return redirect()->route('queries.index')->with('success', 'Query deleted successfully.');
    }
}
