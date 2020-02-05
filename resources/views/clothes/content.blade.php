<?php
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
            <td><a href="{{route('clothes.edit',$cloth->id)}}" role="button">Edit</a> </td>
            <td><a  class="deleteRecord"  data-id="{{ $cloth->id }}" role="button" >Delete</a></td>
        </tr>
    @endforeach
@endif
