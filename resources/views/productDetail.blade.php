@foreach($data as $key => $value)
    <tr>
        <td>{{$value->name}}</td>
        <td>{{$value->sku}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->price}}</td>
        <td>{{$value->is_active == 1 ? 'Active' : 'InActive'}}</td>
      </tr>
@endforeach
