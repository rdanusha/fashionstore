@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Clothes List</div>

                    <div class="card-body">
                        <a class="btn btn-success float-right" href="{{ route('clothes.create') }}" role="button">Add
                            Clothes</a>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Cost(LKR)</th>
                                <th scope="col">Selling Price(LKR)</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($clothes))
                                @foreach($clothes AS $cloth)
                                    <tr>
                                        <th scope="row">{{ $cloth->id }}</th>
                                        <td>{{ $cloth->name }}</td>
                                        <td>{{ $cloth->product_code }}</td>
                                        <td>{{ $cloth->cost }}</td>
                                        <td>{{ $cloth->selling_price }}</td>
                                        <td>{{ $cloth->brand->name }}</td>
                                        <td>{{ $cloth->color }}</td>
                                        <td>{{ $cloth->size }}</td>
                                        <td><a href="{{route('clothes.edit',$cloth->id)}}" role="button">Edit</a></td>
                                        <td><a class="deleteRecord" data-id="{{ $cloth->id }}" role="button">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(() => {
            $(".deleteRecord").click(function () {
                if (confirm('Confirm delete')) {
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax(
                        {
                            url: "clothes/" + id,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function () {
                                console.log("it Works");
                            }
                        });
                }
            });
        });
    </script>
@endsection
