@extends('layouts.admin.master')

@section('title') 
    All Categories
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Categories</h3>
        @endslot
        <li class="breadcrumb-item active">Categories</li>
        @slot('bookmark')
            <a href="{{route('categories.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Category">Add New Category</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <h5>Show Categories - <span class="b-b-success">{{App\Models\Category::count()}}</span></h5>
                        <span>
                            All categories If you want to create and add new categories, 
                            you have to click on the (Add New Category) button at 
                            the top of the page from the left.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col" class="text-center">Date of Creation</th>
                                        <th scope="col" class="text-center">Added By</th>
                                        <th scope="col" class="text-center">Last Updated By</th>
                                        @if(auth()->user()->user_type == "admin")
                                            <th scope="col" class="text-center">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$category->name}}</td>
                                        <td class="text-center">{{$category->description}}</td>
                                        <td class="text-center">{{$category->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                        <td class="text-center">{{$category->create_user->name ?? '???'}}</td>
                                        <td class="text-center">{{$category->update_user->name ?? '???'}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center">
                                                {!! Form::open([
                                                    'route' => ['categories.destroy',$category->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $category->name }}?');" type="submit" title="{{'Delete'." ($category->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button>

                                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($category->name)"}}"><li class="icon-pencil"></li> Edit</a>
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>

                                    @empty
                                        <div class="alert alert-secondary">
                                            There are no data!
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="m-b-30" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-primary">
                        {!! $categories->links('pagination::bootstrap-4') !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection
