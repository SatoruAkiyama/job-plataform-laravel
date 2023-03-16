<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

/**
 * Job Controller
 */
class JobController extends Controller
{

    /**
     * show all jobs
     */
    public function index() {
        return view('jobs/index', [
            'jobs' => Job::orderByDesc('updated_at')
            -> filter(request(['tag', 'search']))
            -> paginate(12)
        ]);
    }

    /**
     * show a job
     */
    public function show($id) {
        $job = Job::find($id);

        if ($job) {
            return view('jobs/show', [
            'job' => Job::find($id)
            ]);
        } else {
            // error page
            abort('404');
        }
    }

    /**
     * show post form
     */
    public function post() {
        return view('jobs/post');
    }

    /**
     * insert a job
     */
    public function insert(Request $request) {

        // validation
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'tasks' => 'required',
            'requirements' => 'required',
            'benefits' => 'required',
            'salary' => 'required',
            'website'=>'url|nullable'
        ]);

        $formFields['companyDescription'] = $request->companyDescription;

        // logo image
        if ($request->hasFile('logo')) {
            // way to use the filesystem to store image
            // $formFields['logo'] = $request ->file('logo')->store('logos', 'public');

            // way to use the binary code for storing image as text
            $formFields['logo'] = base64_encode(file_get_contents($request->logo->getRealPath()));
        }

        $formFields['user_id'] = auth()->id();

        // insert the data to the database
        Job::create($formFields);

        return redirect('/')->with('success', 'Created successfully!');
    }

    /**
     * show edit form.
     */
    public function edit($id) {

        $job = Job::find($id);

        return view('jobs/edit', [
            "job" => $job
        ]);
    }

    /**
     * update job.
     */
    public function update(Request $request) {
        // check if the login user is the owner of the post
        if ($request->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        // validation
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'tasks' => 'required',
            'requirements' => 'required',
            'benefits' => 'required',
            'salary' => 'required',
            'website'=>'url'
        ]);

        $formFields['companyDescription'] = $request->companyDescription;

        // logo image
        if ($request->hasFile('logo')) {
            // way to use the filesystem to store image
            // $formFields['logo'] = $request ->file('logo')->store('logos', 'public');

            // way to use the binary code for storing image as text
            $formFields['logo'] = base64_encode(file_get_contents($request->logo->getRealPath()));
        }

        // update the data in the database
        Job::where('id', $request->id)->update($formFields);

        $url = '/job/' . $request->id;
        return redirect($url)->with('success', 'Updated successfully!');
    }

    /**
     * delete a job.
     */
    public function delete(Request $request) {
        // check if the login user is the owner of the post
        if ($request->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        Job::where('id', $request->id)->delete();

        return redirect('/')->with('success', 'Deleted successfully!');
    }
}
