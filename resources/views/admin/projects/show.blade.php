@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="text-end">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-success h-50 mt-2 text-capitalize">Back to view
                all</a>
        </div>
        <h1>{{ $project->title }}</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <a href="{{ $project->git }}" class="btn btn-tertiary">See GIT!</a>
        <p>Start Date {{ $project->date }}</p>
    </div>
@endsection
