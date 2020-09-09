@extends('foodDelivery.layout')
 
@section('title', 'Cart')
 
@section('content')
 
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Menu</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
 
        <?php $total = 0 ?>
 
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
 
                <?php $total += $details['price'] * $details['quantity'] ?>
 
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{  URL::asset('/photos/'. $details['photo']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <b class="nomargin">{{ $details['name'] }}</b>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">MMK{{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">MMK{{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh" ></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
 
        </tbody>
        <tfoot>
        
        <tr>
            <td><a href="{{ route('foodDelivery.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total MMK{{ $total }}</strong></td>
        </tr>
        <tr>
            
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center">
                <form action="{{route('login-check')}}" method="GET">
                    <input type="submit" class="btn btn-success" value="Delivery" name="submitbutton">
                </form>
            </td>
            <td class="hidden-xs text-center">
                <form action="{{route('login-check')}}" method="GET">
                    <input type="submit" class="btn btn-success" value="Pickup" name="submitbutton">
                </form>
            </td>
        </tr>

        </tfoot>
    </table>
 
@endsection

@section('scripts')
 
 
    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ route('foodDelivery.updateCart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ route('foodDelivery.removeCart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
 
@endsection