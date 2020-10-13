<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Invoice </title>
</head>
<body>
    <div class="container">
        <h3>Invoice</h3>
        <div class="row">
           
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>MenuName</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                 
                        <?php $total = 0 ?>
                 
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                 
                                <?php $total += $details['price'] * $details['quantity'] ?>
                 
                                <tr>
                                    <td data-th="Product">{{ $details['name'] }}  
                                    </td>
                                    <td data-th="Price">${{ $details['price'] }}</td>
                                    <td data-th="Quantity">
                                       <label>{{ $details['quantity'] }}</label>
                                    </td>
                                    <td data-th="Subtotal">${{ $details['price'] * $details['quantity'] }}</td>
                                   
                                </tr>
                            @endforeach
                        @endif
                 
                        </tbody>
                        <tfoot>
                        <tr class="visible-xs">
                            <td><b>Total</b></td>
                            <td colspan="2"></td>
                            <td>{{ $total }}</td>
                           
                        </tr>
                
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
     