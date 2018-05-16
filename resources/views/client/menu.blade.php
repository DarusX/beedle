<div class="col-sm-6">

</div>
<div class="col-sm-6">
    <h2>Órdenes</h2>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Órden</th>
                <th>Fecha/Hora</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->orders as $order)
            <tr>
                <th><a href="{{route('client.order', $order->id)}}" class="btn btn-xs btn-default"><i class="fas fa-plus"></i></a></th>
                <td>{{$order->id}}</td>
                <td>{{$order->updated_at}}</td>
                <td>{{number_format($order->products->sum('total'), 2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>