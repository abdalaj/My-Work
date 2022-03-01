<html dir="rtl">
<head>
    <link rel="stylesheet" href="{{asset('front/bootstrap')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front/dist')}}/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{asset('front/bootstrap')}}/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{asset('front/dist')}}/css/AdminLTE-rtl.min.css">
    <style>
        @media print {

            .printHeader{
                display: block!important;
            }
            a[href]:after {
                content: none !important;display: none !important;
            }
            .main-footer,.dt-buttons,.dataTables_filter{
                display: none ;display: none !important;
            }

            #footer{visibility: visible;display: none !important;}
            a{
                visibility:hidden;display: none !important;
            }
            .table {
                border: 1px solid black !important;
                font-weight: bold;
            }
            .table td,.table thead tr th {
                border: 1px solid black !important;
            }
            @media print {
                .printHeader{
                    display: block!important;
                }
                table  {
                    font-size: {{$settings['PrintSize']}}px !important;
                }
                @page { margin: .1cm; }
                body { margin: .1cm;}
                .panel-default{
                    border: none;
                }
                .hideprint{
                    visibility:hidden;
                    margin:0;
                    display: none !important;
                }
            }

            html, body {
                height:100vh;
                width: 100vh;
                margin: 0px !important;
                padding-right: 5px !important;
                /*overflow: hidden;*/
            }
            @page{
                size: auto;
                height:auto;
                margin-left: 0cm;
                margin-right: 0px;
                margin-top: 0cm;
                margin-bottom: 0px;
                padding: 0cm!important;
            }
        }
        .ticket.A5,table{
            max-width: 21cm;
            width: 21cm;
        }
        .ticket.A4,table{
            max-width: 29.7cm;
            width: 29.7cm;
        }
    </style>
</head>
<body class="ticket {{$settings['printerType']}}">
        <!-- <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger pull-right" href="{{route('orders.index')}}">رجوع</a>
            </div>
        </div> -->
        @if($settings['printerType']=='receipt')
        @include('orders.receipt')
        @else
        @include('orders.show')
        @endif
        <script>
        window.print();
        window.onafterprint = function(){
            if(!window.close()){
                 window.open('{{route('order.create',['notpopup'=>'yes'])}}', '_self', '');
            }
        }
        </script>
</body>
</html>
