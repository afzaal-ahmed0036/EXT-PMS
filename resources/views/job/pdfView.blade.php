<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        .heading {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="heading">Job Overview</div>
    <table>
        <tr>
            <th>Job Title</th>
            <th>Controller Type</th>
            <th>No of Steps</th>
        </tr>
        <tr>
            <td>{{$job->name ?? 'N/A'}}</td>
            <td>{{$job->controller_type ?? 'N/A'}}</td>
            <td>{{$job->no_of_steps ?? 'N/A'}}</td>
        </tr>
        <tr>
            <th>Overseed Governer Voltage</th>
            <th>Brake Voltage</th>
            <th>Moter</th>
        </tr>
        <tr>
            <td>{{$job->overspeed_governer_voltage ?? 'N/A'}}</td>
            <td>{{$job->brake_voltage ?? 'N/A'}}</td>
            <td>{{$job->moter ?? 'N/A'}}</td>
        </tr>
        <tr>
            <th>Encode Type</th>
            <th>No of entrance</th>
            <th>Rescue</th>
        </tr>
        <tr>
            <td>{{$job->encoder_type ?? 'N/A'}}</td>
            <td>{{$job->no_of_entrance ?? 'N/A'}}</td>
            <td>{{$job->resue ?? 'N/A'}}</td>
        </tr>
        

        <tr>
            <th>Delivery Date</th>
            <th>Door Type</th>
            <th></th>
            <!-- <th>Other Materials</th> -->
        </tr>
        <tr>
            <td>{{$job->delivery_date ?? 'N/A'}}</td>
            <td>{{$job->door_type ?? 'N/A'}}</td>
            <td></td>
            <!-- <td>
                @if($job->other_materials)
                {{ implode(', ', $job->other_materials) }}
                @else
                N/A
                @endif
            </td> -->
        </tr>
        <tr>
            <th colspan="3">Additional Details</th>
        </tr>
        <tr>
            <td colspan="3">{{$job->additional_details ?? 'N/A'}}</td>
        </tr>
    </table>
    <br>
    <div class="heading">Job Detail</div>
    <table>
        <tr>
            <th>Estimate No</th>
            <th>Assign To</th>
            <th>Start Date</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>{{$job->EstimateNo ?? 'N/A'}}</td>
            <td>{{ implode(', ', $job->users->pluck('FullName')->toArray()) }}</td>
            <td>{{$job->created_at ?? 'N/A'}}</td>
            <td>{{$job->JobStatus ?? 'N/A'}}</td>
        </tr>
        
    </table>
</body>
</html>
