<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="#" />
    <title>Invoice Print</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 16px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }

        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor: pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }

        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }

        tbody tr {
            border-bottom: 1px dotted #ddd;
        }

            {
            border: 0
        }

        td,
        th {
            padding: 0px;
            width: 50%;
        }

        table {
            width: 100%;
        }

        tfoot tr th:first-child {
            text-align: left;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        small {
            font-size: 11px;
        }

        @media print {
            * {
                font-size: 12px;
                line-height: 20px;
            }

            td,
            th {
                padding: 0px 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 1.5cm 0.5cm 0.5cm;
            }

            @page: first {
                margin-top: 0cm;
            }

            tfoot::after {
                content: ''; display: block;
                page-break-after: always;
                page-break-inside: avoid;
                page-break-before: avoid;        
            }

        }

        .dashed-2 {
            border: none !important;
            height: 1px !important;
            background: #000 !important;
            background: repeating-linear-gradient(90deg, #000 0px, #000 6px, transparent 6px, transparent 12px) !important;
            margin: 0px;
        }
    </style>

</head>
<body>
    @foreach($stickerxy as $value2)
    @for($i=1; $i<=$value2->qty; $i++)
       
        <div style="max-width:400px;margin:0 auto;">
            <div class="hidden-print">
            <div class="row">
                <div class="col-sm-4"><a href="{{URL('/Lables')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>Back</a></div>

                <div class="col-sm-4"><button style="margin-right: 260px !important;" onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i>
                       Print</button></div>
            </div>
        </div>

        <div id="receipt-data">
            <div class="centered">
                <table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0 auto">
                <tr>
                <td style="font-size: 14px; " align="left"><img style="width: 120px;height: 50px;" src="{{ URL('/documents/' . $company->Logo) }}" ></td>
                <td style="font-size: 14px;" align="right"><img style="width: 120px;height: 50px;" src="{{ URL('/documents/' . $company->BackgroundLogo) }}" ></td>
                </tr>
                </table>
            </div>
            
            <hr class="dashed-2">
            <table class="table-data ">
                <thead>
                    <tr>
                        <th style="text-align:left;">Order Number:</th>
                        <th style="text-align:left;">{{ $value2->OrderNumber }}</th>
                        <th style="text-align:center;" rowspan="4"> <?php echo '<img style="height: 50px; width: 50px;text-align:center;" src="data:image/png;base64,' . DNS2D::getBarcodePNG($value2->LabelDeails, 'QRCODE') . '" width="300" alt="barcode"   />'; ?></th>
                    </tr>
                    <tr>
                        <th style="text-align:left">Client Name:</th>
                        <th colspan="2" style="text-align:left" >{{ $value2->ClientName }}</th>
                    </tr>
                    <tr>
                        <th style="text-align:left">Content:</th>
                        <th  colspan="2" style="text-align:left">{{ $value2->Content }}</th>
                    </tr>
                    <tr>
                        <th style="text-align:left">Order Date:</th>
                        <th colspan="2" style="text-align:left">{{ $value2->CustomerOrderDate }}</th>
                    </tr>
                    <tr>
                        <th style="text-align:left">Unit Number:</th>
                        <th colspan="2" style="text-align:left">{{ $value2->UnitNumber }}</th>
                    </tr>
                    <tr>
                        <th style="text-align:left">Description:</th>
                        <th colspan="2" style="text-align:left">{{ $value2->Description }}</th>
                    </tr>
                
                 </thead>
                 <!-- <tfoot>
                    <tr>
                        <th style="text-align:center;" colspan="3"> <?php //echo '<img style="height: 50px; width: 50px;text-align:center;" src="data:image/png;base64,' . DNS2D::getBarcodePNG($value2->LabelDeails, 'QRCODE') . '" width="300" alt="barcode"   />'; ?></th>
                    </tr>
                </tfoot> -->
            </table>
            <hr class="dashed-2">
        </div>
    </div>


       <!--  <table width="100%" align="center" cellpadding="0" cellspacing="0" style="max-width:300;margin:0 auto">
            <tr>
                <td style="font-size: 14px; white-space: nowrap;" align="left"><img style="width: 100px;height: 50px;" src="{{ URL('/documents/' . $company->Logo) }}" ></td>
                <td style="font-size: 14px; white-space: nowrap;" align="right"><img style="width: 100px;height: 50px;" src="{{ URL('/documents/' . $company->BackgroundLogo) }}" ></td>
                
            </tr>
            <tr>
                <td colspan="2" align="center"> <img style="text-align:center;margin-bottom: 10px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($value2->LabelDeails, 'QRCODE')}}" alt="barcode" />
                </td>
            </tr>

            <tr>
                <td align="left" style="width: 100px;">Order Number:</td>
                <td style="font-size: 10px;" align="right">{{ $value2->OrderNumber }}</td>
            </tr>
            <tr>
                <td align="left">Client Name:</td>
                <td style="font-size: 10px;" align="right">{{ $value2->ClientName }}</td>
            </tr>
            <tr>
                <td align="left">Content:</td>
                <td style="font-size: 10px;" align="right">{{ $value2->Content }}</td>
            </tr>
            <tr>
                <td align="left">Order Date:</td>
                <td style="font-size: 10px;" align="right">{{ $value2->CustomerOrderDate }}</td>
            </tr>
            <tr>
                <td align="left">Unit Number:</td>
                <td style="font-size: 10px;" align="right">{{ $value2->UnitNumber }}</td>
            </tr>
            <tr>
                <td align="left">Description:</td>
                <td style="font-size: 10px;" align="right">{{ $value2->Description }}</td>
            </tr>

        </table> -->
        @endfor
        @endforeach
         <script type="text/javascript">
        localStorage.clear();

        function auto_print() {
           window.print()
        }
        setTimeout(auto_print, 1000);
    </script>
</body>
</html>