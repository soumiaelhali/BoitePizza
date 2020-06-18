@extends('website/layouts/layout')
@section('title', 'Mon Panier')
@section('content')
<section class="section section-md bg-default">
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">
                        <h5 class="cart-inline-title">Produits</h5>
                    </th>
                    <th style="width:10%">
                        <h5 class="cart-inline-title">Prix</h5>
                    </th>
                    <th style="width:15%">
                        <h5 class="cart-inline-title">Quantite</h5>
                    </th>
                    <th style="width:22%" class="text-center">
                        <h5 class="cart-inline-title">Total</h5>
                    </th>
                    <th>
                        <h5 class="cart-inline-title">Actions</h5>
                    </th>
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
                            <div class="col-sm-3 hidden-xs"><img src="{{'storage/'.$details['photo'] }}" width="100"
                                    height="100" class="img-responsive" /></div>
                            <div class="col-sm-9">
                                <h6 class="cart-inline-name">{{ $details['name'] }}</h6>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">
                        <h6 class="cart-inline-title">${{ $details['price'] }}</h6>
                    </td>
                    <td data-th="Quantity">

                        <input class="form-input quantity" type="number" data-zeros="true"
                            value="{{ $details['quantity'] }}" min="1" max="1000">

                    </td>
                    <td data-th="Subtotal" class="text-center">
                        <h6 class="cart-inline-title">${{ $details['price'] * $details['quantity'] }}</h6>
                    </td>
                    <td data-th="Action">
                        <button class="update-cart" style="background-color: rgb(90, 90, 207);border: none; height:35px;width: 35px ; color:  white ;  text-align: center;display: inline-block; border-radius: 4px;" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="remove-from-cart" style="background-color: rgb(189, 37, 37);border: none; height:35px;width: 35px ; color:  white ;  text-align: center;display: inline-block; border-radius: 4px;" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center">
                        <h6 class="cart-inline-title"><strong>Total {{ $total }}</strong></h6>
                    </td>
                </tr>
                <tr>
                    <td><a class="button button-md button-primary " href="{{url('/')}}"></i> Continuer vos Achats</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>
                            <h6 class="cart-inline-title">Total ${{ $total }}</h6>
                        </strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

@endsection
@section('script')

<script type="text/javascript">
    $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   console.log("update works");

                 /*window.location.reload();*/
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("etes vous sure !!")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
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
