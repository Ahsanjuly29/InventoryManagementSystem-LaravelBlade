@extends('layouts.master')
@section('main-body')
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Create Customer</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('customers.create') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="name" name="name" placeholder="Ahsan"
                                        class="form-control" value="{{ old('name') ?? '' }}">
                                </div>
                                @if ($errors->has('name'))
                                    <p class="error text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" id="email" name="email" placeholder="ahsan.july29@gmail.com"
                                        class="form-control" value="{{ old('email') ?? '' }}">
                                </div>
                                @if ($errors->has('email'))
                                    <p class="error text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <input type="text" id="phone" name="mobile" placeholder="01777519553"
                                        class="form-control" value="{{ old('mobile') ?? '' }}">
                                </div>
                                @if (!empty($error))
                                    @dd($error)
                                @endif
                                @if ($errors->has('mobile'))
                                    <p class="error text-danger">{{ $errors->first('mobile') }}</p>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if (\Session::has('success') || \Session::has('error'))
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body card-block">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <blockquote>
                                    {!! \Session::get('success') !!}
                                </blockquote>
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-warning">
                                <blockquote>
                                    {!! \Session::get('error') !!}
                                </blockquote>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th class="text-right">Created</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td scope="row">
                                    {{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $customer->name ?? '--' }}</td>
                                <td>{{ $customer->email ?? '--' }}</td>
                                <td>{{ $customer->mobile ?? '--' }}</td>
                                <td class="text-right">{{ date('Y-m-d', strtotime($customer->created_at)) }}</td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <form class="form d-inline" action="{{ route('customers.delete', $customer->id) }}"
                                        method="post">
                                        @csrf @method('delete')
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                                            onclick="return confirm('sure Want to delete?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="text-right">
                            <td colspan="6">{{ $customers->links() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
