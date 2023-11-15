@extends('layouts.app')
@section('content')

<div class="container py-4 pt-5 center">
    <table>
        <td class="pe-5">
            <p class="title-1">@lang('app.associate.a_sec')</p>
            <p class="title-2">@lang('app.associate.r_u_billio')</p>
        </td>
        <td>
            <img class="border-round drop" width="800" src="https://i.postimg.cc/wMKSbg4x/miguapa-pantallazo.png" alt="">
        </td>
    </table>

    <div class="block">
        <table>
            <td>
                <img width="400" src="https://i.postimg.cc/wTWMsNRX/Logo-Miguapa-Mundi.png" alt="">
            </td>
            <td>
                <div class="pt-5 title-3 pe-5">
                    <p>@lang('app.associate.right_place')</p>
                    <p>@lang('app.associate.introduction')</p>
                    <p><b>@lang('app.associate.awesome')<b></p>
                </div>
            </td>
        </table>
    </div>

    <div class="center pt-5">
        <p class="title-3 pb-4">@lang('app.associate.table')</p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">@lang('app.associate.id')</th>
                    <th scope="col">@lang('app.associate.name')</th>
                    <th scope="col">@lang('app.associate.nickname')</th>
                    <th scope="col">@lang('app.associate.owner')</th>
                    <th scope="col">@lang('app.associate.min')</th>
                    <th scope="col">@lang('app.associate.appealing')</th>
                    <th scope="col">@lang('app.associate.best')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['apiData'] as $country)
                <tr>
                    <td scope="row">{{ $country['id'] }}</td>
                    <td>{{$country['name']}}</td>
                    <td>{{$country['nick_name']}}</td>
                    <td>{{$country['owner']}}</td>
                    <td>{{$country['minimum_offer_value']}}</td>
                    <td>{{$country['attractive_value']}}</td>
                    <td>{{$country['best_actual_offer_value']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="title-2 pb-4 pt-5">
            @lang('app.associate.more_info')
            <a class="none-dec" href="http://www.miguapamundi.tech/public//"><b>Miguapa Mundi</b></a>.
        </p>
    </div>
</div>


@endsection