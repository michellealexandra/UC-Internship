<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectAttachment;
use Illuminate\Http\Request;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'project';
        $projects = Project::all();
        return view('admin.project.index', compact('pages', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $pages = 'project';
        return view('admin.project.detail', compact('pages', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->update([
            'status' => '3',
        ]);
        return redirect()->back();
    }

    public function zipFile(Request $request)
    {
        $project = Project::find($request->project_id);
        $projectFiles = ProjectAttachment::where('project_id', $project->id)->get();
        $zip = new ZipArchive;
        $fileNameZip =  $project->name . 'Attachments.zip';
        if (Storage::exists(public_path($fileNameZip))) {
            unlink(public_path($fileNameZip));
        }
        if ($zip->open(public_path($fileNameZip), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path('attachments\project'));
            foreach ($files as $file) {
                foreach ($projectFiles as $projectFile) {
                    if ($projectFile->name == basename($file)) {
                        $zip->addFile($file, basename($file));
                    }
                }
            }
            $zip->close();
        }
        return response()->download(public_path($fileNameZip));
    }
}
