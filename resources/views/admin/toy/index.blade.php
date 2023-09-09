@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="row d-flex justify-content-center py-2 px-2">
    @foreach ($viewData['toys'] as $toy)
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
        <div class="card-body p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 d-flex justify-content-lg-between">
                            <h5 class="card-title">{{ $toy->getModel() }}</h5>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-lg-around">
                                <a href="" id="admin-show"><i class="fa-solid fa-eye"></i> @lang('admin.toys.show')</a>
                                <a href="" id="admin-edit"><i class="fa-solid fa-pen"></i> @lang('admin.toys.edit')</a>
                                <a href="" id="admin-delete"><i class="fa-solid fa-trash"></i> @lang('admin.toys.delete')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection