<table>
    <thead>
    <tr>
        @foreach($Header as $h)
            <th style="border:1px solid black"><b>{{$h}}</b></th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($ListData as $data)
        <tr>
            @for($i = 0; $data = array_values((array)$data), $length = count($data), $i < $length; $i++)
                <td>{{$data[$i]}}</td>
            @endfor
        </tr>
    @endforeach
    </tbody>
</table>
