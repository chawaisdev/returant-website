@extends('layouts.app')

@section('title')
    Brand Index
@endsection

@section('body')
    <div class="container-fluid">
        <!-- PAGE HEADER -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Brand </li>
                </ol>
            </nav>
            <button class="btn btn-primary btn-sm" onclick="openAddModal()">{{ __('messages.add_brand') }}</button>
        </div>

        <!-- TABLE -->
        <div class="col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title">{{ __('messages.all_brand') }}</h6>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('messages.s_r') }}</th>
                                    <th scope="col">{{ __('messages.brand_name') }}</th>
                                    <th scope="col">{{ __('messages.created_at') }}</th>
                                    <th scope="col">{{ __('messages.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $index => $brand)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <button class="btn btn-sm btn-warning"
                                                onclick="openEditModal({{ $brand }})">
                                                <i class="fa fa-pen-to-square"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="brandForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <input type="hidden" name="id" id="brand_id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="brandModalLabel">{{ __('messages.edit_brand') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="brand_name">{{ __('messages.brand_name') }} </label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBtn">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function openAddModal() {
            $('#brandForm').attr('action', '{{ route('brands.store') }}');
            $('#formMethod').val('POST');
            $('#brandModalLabel').text('Add Brand');
            $('#brand_name').val('');
            $('#brand_id').val('');
            $('#brandModal').modal('show');
        }

        function openEditModal(brand) {
            $('#brandForm').attr('action', '/brands/' + brand.id);
            $('#formMethod').val('PUT');
            $('#brandModalLabel').text('Edit Brand');
            $('#brand_name').val(brand.brand_name);
            $('#brand_id').val(brand.id);
            $('#brandModal').modal('show');
        }
    </script>
@endsection
