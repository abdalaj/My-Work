<head>
    <style type="text/css">
        * {
            font-family: 'Times New Roman';
            font-weight: 1000;
            font-size: 18px;
            text-transform: capitalize;
        }

        input {
            border: 1px solid #000;
        }

    </style>
</head>
<div>
    <img src="{{ asset('images/logo.jpg') }}" width="100%" height="150px" alt="">
</div><br>
<div class="container" style="width: 100% !important;padding: 0 !important">
    <div class="row">
        <div class="col-12">
            @foreach ($print as $item)
                <div class="ticket" style="text-align: center;margin: auto" dir="ltr">
                    <div class="div_2">
                        <div class="_1"
                            style="display: flex;justify-content:space-between;text-align: left;font-size: 18px !important">

                            <div class="01" style="width: 40%;font-size: 14px !important">
                                <span style="border-bottom: 1.5px solid gray;font-size: 14px !important">
                                    # <u>{{ $item->id }}</u>
                                </span>
                            </div>
                            <div class="02" style="width: 40%;font-size: 14px !important">
                                كاشير {{ Auth::user()->name }}
                            </div>
                            <div style="font-size: 14px !important">
                                {{ $item->created_at }}
                            </div>
                        </div>
                        <hr>
                        <center>
                            <h3>
                                تفاصيل الوقت
                            </h3>
                        </center><br>
                        <table style="text-align: left !important;width: 90%">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>start</th>
                                    <th>end</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->start }}
                                    </td>
                                    <td>
                                        {{ $item->end }}
                                    </td>

                                </tr>
                            </tbody>

                        </table>
                        <br>

                        <table style="text-align: left !important;width: 100%">
                            <thead style="width: 100%">
                                <tr style="width: 100%">
                                    <th>hour</th>&nbsp;&nbsp;
                                    <th>Price</th>&nbsp;&nbsp;
                                    <th>Amount</th>&nbsp;&nbsp;
                                </tr>
                            </thead>
                            <tbody style="width: 100%">
                                <tr style="width: 100%">
                                    <td>
                                        {{ $item->hours }}
                                    </td>&nbsp;&nbsp;
                                    <td>
                                        {{ $item->price }}
                                    </td>&nbsp;&nbsp;
                                    <td class="fully">
                                        {{ $item->fully }}
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <hr>
                        <center>
                            <h3>
                                تفاصيل الاكلات والمشاريب
                            </h3>
                        </center><br>
                        <table style="text-align: left !important;width: 100%">
                            <thead style="width: 100%">
                                <tr style="width: 100%">
                                    <th>name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody style="width: 100%">
                                @foreach ($item->orderfood as $i)
                                    <tr style="width: 100%">
                                        <td style="border: 1px solid #000">
                                            {{ $i->name }}
                                        </td>
                                        <td style="border: 1px solid #000">
                                            {{ $i->qty }}
                                        </td>

                                        <td style="border: 1px solid #000" class="pr_food">
                                            {{ $i->price }}
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td class="fo" style="border: 1px solid #000">

                                    </td>
                                </tr>

                            </tfoot>
                        </table><br>
                        <table style="text-align: center !important">
                            <thead>
                                <tr>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="am" style="border: 1px solid #000">

                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            var total = 0;
            $(".pr_food").each(function(x, y) {
                amount = parseFloat($(this).text()).toFixed(2) - 0;
                total += amount;
                $(".fo").text(total);
            });
            total += parseFloat($(".fully").text());
            $(".am").text(total);
        })
    </script>
    <script>
        setTimeout(() => {
            window.print();

        }, 1000);
        window.onafterprint = function() {
            if (!window.close()) {
                window.open('{{ route('orders.index', ['notpopup' => 'yes']) }}', '_self', '');
            }
        }
    </script>
</head>
