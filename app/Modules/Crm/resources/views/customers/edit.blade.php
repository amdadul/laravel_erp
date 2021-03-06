@extends('layouts.app')
@section('title') {{ $pageTitle }} @endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
@endpush

@section('content')
    @include('inc.flash')
    <section class="basic-elements">
        <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New Customers</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('crm.customers.update',$data->id)}}">
                            @method('POST')
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="customerName" >Customer Name</label>
                                    <input type="text" id="customerName"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{old('name')?old('name'):$data->name}}"
                                           placeholder="Customer Name"
                                           name="name">
                                    @error('name')
                                    <div class="help-block text-danger">{{ $message }} </div> @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerContact" >Customer Contact</label>
                                            <input type="text" id="customerContact"
                                                   class="form-control @error('contact_no') is-invalid @enderror"
                                                   placeholder="Customer Contact" value="{{old('contact_no')?old('contact_no'):$data->contact_no}}"
                                                   name="contact_no">
                                            @error('contact_no')
                                            <div class="help-block text-danger">{{ $message }} </div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="store">Store</label>
                                            <select id="store" name="store_id"
                                                    class="select2 form-control @error('store_id') is-invalid @enderror">
                                                <option value="none" selected="" disabled="">Select Store</option>
                                                @foreach($stores as $store)
                                                    <option
                                                        value="{{$store->id}}" {{$store->id==(old('store_id')?old('store_id'):$data->store_id)?'selected':''}} >{{$store->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('store_id')
                                            <div class="help-block text-danger">{{ $message }} </div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="territory_id" >Territory</label>
                                            <select id="territory" name="territory_id" class="select2 form-control @error('territory_id') is-invalid @enderror">
                                                <option value="none" selected="" disabled="">Select Territory</option>
                                                @foreach($territories as $territory)
                                                    <option
                                                        value="{{$territory->id}}" {{$territory->id==(old('territory_id')?old('territory_id'):$data->territory_id)?'selected':''}} >{{$territory->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('territory_id')<div class="help-block text-danger">{{ $message }} </div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Customer Address</label>
                                    <textarea id="address" rows="5"
                                              class="form-control @error('address') is-invalid @enderror" name="address"
                                              placeholder="Customer Address">{{old('address')?old('address'):$data->address}}</textarea>
                                    @error('address')
                                    <div class="help-block text-danger">{{ $message }} </div> @enderror
                                </div>

                                <div class="form-actions">
                                    <a type="button" href="{{ route('crm.customers.index') }}"
                                       class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
@endpush
