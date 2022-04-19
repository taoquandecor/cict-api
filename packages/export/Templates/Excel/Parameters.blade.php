<table>
    <tbody>
    <tr>
        <td><b>{{__("Execution date/time")}}</b></td>
        <td>{{now()}}</td>
    </tr>
    @foreach ($Parameters as $key => $value)
        <tr>
            <td><b>{{$key}}</b></td>
            <td>{{$value}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
