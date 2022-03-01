
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>طباعة الفاتورة</title>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.4/dist/barcodes/JsBarcode.code128.min.js"></script>
                <script src="{{asset('js/qr/qrcode.js')}}"></script>
                <style>
                    *{
                        box-sizing: border-box;
                        margin:0;
                        padding:0;
                        font-weight: bold;
                    }
                    @media print {
                        @page {
                            margin-left: 0.5in;
                            margin-right: 0.5in;
                            margin-top: 5px;
                            margin-bottom: 0;
                        }
                    }
                    * {
                        font-family: 'Times New Roman';
                        font-weight: bold;
                        text-transform: capitalize;
                    }
                    * {
                        font-weight: bold !important;
                    }
                    .centered {
                        text-align: center;
                        align-content: center;
                    }


                    img {
                        max-width: inherit;
                        width: inherit;
                    }

                    hr{
                        border: 1px solid gray
                    }
                    @media print {
                        .hidden-print,
                        .hidden-print * {
                            display: none !important;
                        }
                        .ticket,table{
                            max-width: 11cm;
                            width: 11cm;
                        }
                    }
                </style>
            </head>
            <body>
            <div id="pills" style="text-align: right !important;margin-top:5px" dir="rtl">
                @foreach ($data as $d)
                    <div id="qrResult" style="text-align: right !important">

                    </div>
                    <script>
                        var qr = new QRCode(document.getElementById('qrResult'),{
                            width:180,
                            height:180
                        }
                        );
                        qr.makeCode("<?= ' رقم الفاتوره ' . $d->id . '  اسم المنتج ' . $d->name . '  من محل ' . Auth::user()->name_market . ' ومالكه ' . Auth::user()->name ?>");
                    </script>
                    <br>
                    <br>
                        <div style="padding-bottom:5px;margin-bottom:5px;">
                            رقم الفاتورة :- # <span  ><u>{{$d->id}}</u></span>
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            رقم التاجر :-&nbsp;&nbsp;&nbsp; {{Auth::user()->id}}&nbsp;&nbsp;&nbsp; يستخدم للابلاغ عنه اذا حدثت اية مشاكل
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            اسم التاجر :- {{Auth::user()->name}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            اسم المحل :- {{Auth::user()->name_market}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            عنوان المحل :- {{Auth::user()->address}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            اسم العميل :- {{$d->name}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            طلب العميل :- {{$d->describ}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            معلومات اكتر عن طلب العميل :- {{$d->details}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            رقم هاتف العميل :- {{$d->phone}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            عنوان العميل :- {{$d->city ." - " . $d->carya}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                           الكميه المطلوبه :- {{$d->many}}
                        </div>
                        <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                            السعر للمنتج الواحد :- {{$d->price}}
                         </div>
                         <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                           الاجمالي :- {{(int)$d->price * (int)$d->many}}
                         </div>
                         <div style="border-bottom:1px solid #000;padding-bottom:5px;margin-bottom:5px;">
                           توقيع البائع :-
                          </div>

                          <?php
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            echo'<img style="width:auto" src="data:image/png;base64,' . base64_encode($generator->getBarcode( $d->id . " - " . $d->describ . " - " . Auth::user()->id , $generator::TYPE_CODE_128,1)) . '">'
                          ?>
                @endforeach
                <br><br>
                <div style="padding-bottom:5px;margin-bottom:5px;text-align:center">
                    شكرا جدا علي ثقتكم بنا وسنسعي دائما لفعل كل ماهوا جديد لتلبية احتياجتكم وتنفيذا لشعارنا اسرع شحن لارخص سعر في مصر تحياتنا لكم ونتمني لكم يوما سعيد ♥☺
                </div>
            </div>
            <br>

            <script>
                setTimeout(() => {
                    window.print();

                }, 1000);
                window.onafterprint = function(){
                        if(!window.close()){
                            window.open('{{route('orders.index',['notpopup'=>'yes'])}}', '_self', '');
                        }
                    }
            </script>
            </body>
            </html>
