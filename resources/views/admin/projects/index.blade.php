@extends('layouts.admin')

@section('content')
    <div class="text-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success h-50 mt-5 me-5">Create new post</a>
    </div>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="text-capitalize">
                    <th class="d-none d-md-table-cell" scope="col">project title</th>
                    <th class="text-start" scope="col">git</th>
                    <th class="text-start" scope="col">date</th>
                    <th class="text-start" scope="col">type</th>
                    <th class="text-start" scope="col">repo name</th>
                    <th class="text-start" scope="col">updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="text-capitalize">{{ $project->title }}</td>
                        <td><a href="{{ $project->git }}">{{ $project->git }}</a></td>
                        <td>{{ $project->date }}</td>
                        <td>{{ $project->type ? $project->type->name : 'No Type' }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td><a href="{{ route('admin.projects.show', $project->slug) }}"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="delete-button" data-item-title="{{ $project->title }}"> <i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginate">
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
    </div>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    @include('partials.popupdelete')
@endsection
