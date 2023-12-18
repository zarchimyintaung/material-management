<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UCS - Myeik</title>
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container{
            width: 100%;
            padding: 10px;
        }

        .page-break {
            page-break-before: always !important;
            margin: 10px;
        }   

        h3{
            font-weight: bold;
            font-size: 25px;
            margin: 20px 0;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }
        tr{
            height: 40px;
            border: 1px solid rgba(39, 38, 38, 0.626)
            border-collapse: collapse;
        }

        table tr {
            page-break-inside: avoid !important;
        }

        th{
            background-color: rgb(253, 253, 253);
            padding: 5px;
            border: 1px solid rgba(39, 38, 38, 0.626);
            border-collapse: collapse;
            text-align: start
        }
        td{
            background-color: #fff;
            padding: 5px;
            border: 1px solid rgba(39, 38, 38, 0.626);
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Report for UCS-Myeik Material</h3>
        <div>
            <table>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Department</th>
                    <th>Type</th>
                    @foreach ($categories as $category)
                    <th>{{ $category }}</th>                            
                    @endforeach
                  </tr>
                </thead>
                @if (count($data) > 0)
                <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($data as $key => $item)
                        <tr>
                            <th rowspan="{{ count($item) }}">
                                {{ ++$count }}
                            </th>
                            <td rowspan="{{ count($item) }}">
                                {{ $key }}
                            </td>
                        @php
                            $row = 0;
                        @endphp
                        @foreach ($item as $k => $i)
                            @if ($row == 0)
                                <td>
                                    {{ $k }}
                                </td>
                                @foreach ($i as $c => $v)
                                <td>
                                   <?= $v == 0 ? '-' : $v ?>
                                </td>
                                @endforeach
                                @php
                                    $row++;
                                @endphp
                                </tr>
                            @else
                            <tr>                                          
                                <td>
                                    {{ $k }}
                                </td>
                                @foreach ($i as $c => $v)
                                <td>
                                   <?= $v == 0 ? '-' : $v ?>
                                </td>
                                @endforeach
                            </tr>
                            @php
                                $row++;
                            @endphp
                            @endif
                        @endforeach
                        @if ($count % 4 == 0)
                            <div class="page-break"></div>
                        @else
                            
                        @endif
                    @endforeach
                </tbody>
                @else
                    <tbody>
                        <tr>
                            <td>There is no deparments !</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>
    </div>
</body>
</html>