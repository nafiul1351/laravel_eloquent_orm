@extends('layouts.app')
@section('content')
    @include('partials.header')
    <div class="main">
        <h2 class="main_head">All data in 1st table</h2>
        <table class="main_table">
            <thead>
                <tr>
                    <th class="main_table_head">Text</th>
                    <th class="main_table_head">Text 2</th>
                    <th class="main_table_head">Image</th>
                    <th class="main_table_head">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($views as $view)
                    <tr>
                        <td class="main_table_data">{{ $view -> text}}</td>
                        <td class="main_table_data">
                            @if($view->secondtestinputs->isEmpty())
                                No Text 2
                            @else
                                @foreach($view->secondtestinputs as $secondtestinput)
                                    {{ $secondtestinput -> text2 }}<br>
                                @endforeach
                            @endif
                        </td>
                        @if($view -> image != null)
                            <td class="main_table_data">
                                <img style="height: 50px; width: 50px; border-radius: 5px;" src="{{asset($view->image)}}">
                            </td>
                        @elseif($view -> image == null)
                            <td class="main_table_data">No Image</td>
                        @endif
                        <td class="main_table_data">
                            <a class="table_link" href="{{ route('update', $view->id) }}"><i class="fa fa-edit"></i></a>
                            <a class="table_link" href="{{ route('delete', $view->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="link_section">
            <a class="link" href="{{ route('welcome') }}">Add data in 1st table</a>
        </div>
        <div class="update_link_section">
            <a class="link" href="{{ route('add2') }}">Add data in 2nd table</a>
        </div>
        <div class="update_link_section">
            <a class="link" href="{{ route('view2') }}">View 2nd table datas</a>
        </div>
    </div>
    @include('partials.footer')
@endsection