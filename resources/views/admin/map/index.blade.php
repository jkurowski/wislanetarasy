@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-head container-fluid">
                <div class="row">
                    <div class="col-6 pl-0">
                        <h4 class="page-title row"><i class="fe-map-pin"></i>Przeglądaj</h4>
                    </div>
                </div>
            </div>
            <div class="table-overflow">
                @if (session('success'))
                    <div class="alert alert-success border-0 mb-0">
                        {{ session('success') }}
                        <script>window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function(){$(this).remove()})},3000);</script>
                    </div>
                @endif
                <table class="table mb-0">
                    <thead class="thead-default">
                    <tr>
                        <th>Nazwa</th>
                        <th>Adres</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="content">
                    @foreach ($list as $p)
                        <tr id="recordsArray_{{ $p->id }}">
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->address }}</td>
                            <td class="option-120">
                                <div class="btn-group">
                                    <a href="{{route('admin.map.edit', $p->id)}}" class="btn action-button mr-1" data-toggle="tooltip" data-placement="top" title="Edytuj wpis"><i class="fe-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
