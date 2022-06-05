@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      {{ session('message') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (isset($cards) && $cards->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>الإسم</th>
                                
                                <th>العنوان</th>
                                <th>تاريخ الميلاد</th>
                                <th>الهاتف</th>
                                <th>الحاله</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cards as $index => $item)
                                <tr>
                                    {{-- <td>{{ $item + 1 }}</td> --}}
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->berth_date }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td><img src="{{ asset($item->imag)}}" style="width: 31%;"></td>
                                    <td>
                                        @if ($item->status == 0)
                                            <span style="color: #f03">غير مفعل</span>
                                        @else
                                            <span style="color: rgb(32, 243, 43)">مفعل</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('secur-card.edit', $item->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i>تعديل</a>


                                        <form method="post" action="{{ route('secur-card.destroy', $item->id) }}"
                                            style="display: inline-block">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                    class="fa fa-trash"></i>حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="content-center">
                        {{-- {{ $cards->request()->links() }} --}}
                    </div>
                @else
                    <h2>لا يوجد بيانات</h2>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
