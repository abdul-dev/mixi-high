    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aloha!</title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }

            table {
                font-size: x-small;
            }

            .d-flex div {
                font-size: x-small;
            }

            .gray {
                background-color: lightgray
            }

            d-flex {
                /*clear: both;*/
            }

            .d-flex > div {
                width: 50%;
                float: left;
            }

        </style>

    </head>
    <body style="">
    <table class="" style="width:100%;margin:10px 0px 20px 0px;">
        <tr>
            <td align=""><img src="{{asset('assets/media/logo.png')}}" alt="" width="150"/></td>
            <td align="right"><h3>{{env('APP_NAME')}}</h3></td>
        </tr>
    </table>
    <div class="d-flex" style="padding:00px 0px 20px 0px;clear: both">

        <div>


            <div align="">

                <strong>Company Name: </strong>{{env('COMP_NAME')}}
            </div>
            <div align="">

                <strong>Phone Number: </strong>{{env('COMP_PHNO')}}
            </div>
            <div align="">

                <strong>Address: </strong>{{env('COMP_ADDRESS')}}
            </div>
        </div>
        <div style="text-align: right">

            <div align="">

                <strong>Email: </strong>{{env('COMP_EMAIL')}}
            </div>
            <div align="">

                <strong>Fax No: </strong>{{env('COMP_FXNO')}}
            </div>

        </div>
    </div>

    <table width="100%" style="clear:both;padding-top: 30px; ">
        <thead style="background-color: lightgray;">
        <tr style="text-align: center">
            <th>#</th>
            <th>Item Code</th>
            <th>Product Group</th>
            <th>Item Description</th>
            <th>Strength</th>
            <th>Pack Size</th>
        </tr>
        </thead>
        <tbody style="text-align: center;border-bottom:1px solid black; ">
        xs

        @if(!empty($Products))


            @foreach($Products as $key => $product)
                <tr style="text-align: center">
                    <th scope="row">{{$key+1}}</th>
                    <td align="">{{$product->item_code }}</td>
                    <td align="">{{$product->product_group ? $product->product_group->name : ""}}</td>
                    <td scope="row">{{($product->item_description)."(".($product->product_tag ? $product->product_tag->name : "").")" }}</td>
                    <td align="">{{$product->strength }}</td>
                    <td align="">{{$product->pack_size }}</td>
                </tr>

            @endforeach
        @endif
        </tbody>

    </table>

    </body>
    </html>

