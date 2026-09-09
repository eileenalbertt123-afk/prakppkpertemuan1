<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{
    public function index()
    {
        $lists = TaskList::where('user_id', Auth::id())->get();

        return view('lists.index', compact('lists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TaskList::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, TaskList $list)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        abort_if($list->user_id !== Auth::id(), 403);

        $list->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function destroy(TaskList $list)
    {
        abort_if($list->user_id !== Auth::id(), 403);

        $list->delete();

        return redirect()->back();
    }
}