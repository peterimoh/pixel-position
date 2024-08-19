<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $collection = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');
//        $featured = $collection->filter(function ($job) {
//            return $job->featured == true;
//        });
        return view('jobs.index', [
            'jobs' => $collection[0],
            'featuredJobs' => $collection[1],
            'tags' => Tag::all()
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable']
        ]);

        $payload['featured'] = $request->has('featured');
        $job = Auth::user()->employer->jobs()->create(Arr::except($payload, ['tags']));

        if($payload['tags'] ?? false){
            foreach (explode(',', $payload['tags']) as $tag){
                $job->tag($tag);
            }
        }

        return redirect('/');
    }
}
