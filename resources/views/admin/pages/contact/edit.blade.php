@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật trạng thái liên hệ</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('contacts.update', $contact->id) }}" method='post'>
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    {{-- Người liên hệ --}}
                                    <div class="form-group">
                                        <label for="cate">Tên liên hệ</label>
                                        <input type="text" class="form-control" id="cate" disabled name="name"
                                            value="{{ $contact->name }}">
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="{{ $contact->email }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- phone --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" value="{{ $contact->phone }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                            {{-- note --}}
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <input class="form-control" id="description" value="{{ $contact->content }}" name="description"
                                    disabled>
                            </div>

                            {{-- trạng thái --}}
                            <div class="form-group">
                                <label for="status_payment">Trạng thái</label>
                                <select class="form-control" name="status_contact" id="status_payment">
                                    <option value="Chưa liên hệ"
                                        {{ $contact->status_contact == 'Chưa liên hệ' ? "selected='selected'" : '' }}>Chưa
                                        liên hệ</option>
                                    <option value="Đã liên hệ"
                                        {{ $contact->status_contact == 'Đã liên hệ' ? "selected='selected'" : '' }}>Đã liên hệ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect waves-light" value="Cập nhật">Cập
                                    nhật</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
