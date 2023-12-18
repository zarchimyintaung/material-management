@extends('layouts.user-app')

@section('content')

<div class="container mx-auto" style="margin-top: 150px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="fs-3 w-100">
                            Material Report
                        </h2>
                        <form action="/report-items" id="reportfilter"  class="d-block w-100">
                            <select class="default-select border border-primary form-control wide report-filter" name="department_name">
                                <option>Select Department</option>
                                <option value="All">All Deparments</option>
                                @foreach (App\Models\Department::all() as $department)
                                    <option value="{{ $department->name }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Department</th>
                                    <th>Type</th>
                                    @foreach ($categories as $category)
                                    <th>{{ $category->name }}</th>                            
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
                                            <th rowspan="{{ count($item) }}" class="text-center">
                                                {{ ++$count }}
                                            </th>
                                            <td rowspan="{{ count($item) }}" class="text-center">
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
                </div>
            </div>
        </div>
</div>

@endsection