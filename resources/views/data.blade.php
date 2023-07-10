@extends('layout.main')

@section('container')

<main class="main-content position-relative border-radius-lg ">
    @include('layout.navbar')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
            <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Weather data history</h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="tab-2018" data-bs-toggle="tab" data-bs-target="#tab-2018-pane" type="button" role="tab" aria-controls="tab-2018-pane" aria-selected="true">2018</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-2019" data-bs-toggle="tab" data-bs-target="#tab-2019-pane" type="button" role="tab" aria-controls="tab-2019-pane" aria-selected="false">2019</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-2020" data-bs-toggle="tab" data-bs-target="#tab-2020-pane" type="button" role="tab" aria-controls="tab-2020-pane" aria-selected="false">2020</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-2021" data-bs-toggle="tab" data-bs-target="#tab-2021-pane" type="button" role="tab" aria-controls="tab-2021-pane" aria-selected="false">2021</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-2022" data-bs-toggle="tab" data-bs-target="#tab-2022-pane" type="button" role="tab" aria-controls="tab-2022-pane" aria-selected="false">2022</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="tab-2023" data-bs-toggle="tab" data-bs-target="#tab-2023-pane" type="button" role="tab" aria-controls="tab-2023-pane" aria-selected="false">2023</button>
                    </li>
                  </ul>
                </div>
                <div class="card-body px-2 pt-0 pb-2 tab-content " id="myTabContent">
                <div class="tab-pane fade show active table-responsive p-0 scrollTableWeather" id="tab-2018-pane" role="tabpanel" aria-labelledby="tab-2018" tabindex="0">
                    <table class="table align-items-center mb-0">
                    <thead class="sticky-top table-secondary">
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rainfall</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temperature</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Humidity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wind Speed</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunshine Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weather2018 as $data)
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->date; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->temperature; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->humidity; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->raingauge; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->sunshine; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->windspeed; }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive p-0 scrollTableWeather" id="tab-2019-pane" role="tabpanel" aria-labelledby="tab-2019" tabindex="0">
                    <table class="table align-items-center mb-0">
                    <thead class="sticky-top table-secondary">
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rainfall</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temperature</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Humidity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wind Speed</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunshine Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weather2019 as $data)
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->date; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->temperature; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->humidity; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->raingauge; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->sunshine; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->windspeed; }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive p-0 scrollTableWeather" id="tab-2020-pane" role="tabpanel" aria-labelledby="tab-2020" tabindex="0">
                    <table class="table align-items-center mb-0">
                    <thead class="sticky-top table-secondary">
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rainfall</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temperature</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Humidity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wind Speed</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunshine Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weather2020 as $data)
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->date; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->temperature; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->humidity; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->raingauge; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->sunshine; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->windspeed; }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive p-0 scrollTableWeather" id="tab-2021-pane" role="tabpanel" aria-labelledby="tab-2021" tabindex="0">
                    <table class="table align-items-center mb-0">
                    <thead class="sticky-top table-secondary">
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rainfall</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temperature</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Humidity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wind Speed</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunshine Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weather2021 as $data)
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->date; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->temperature; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->humidity; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->raingauge; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->sunshine; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->windspeed; }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive p-0 scrollTableWeather" id="tab-2022-pane" role="tabpanel" aria-labelledby="tab-2022" tabindex="0">
                    <table class="table align-items-center mb-0">
                    <thead class="sticky-top table-secondary">
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rainfall</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temperature</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Humidity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wind Speed</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunshine Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weather2022 as $data)
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->date; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->temperature; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->humidity; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->raingauge; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->sunshine; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->windspeed; }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive p-0 scrollTableWeather" id="tab-2023-pane" role="tabpanel" aria-labelledby="tab-2023" tabindex="0">
                    <table class="table align-items-center mb-0">
                    <thead class="sticky-top table-secondary">
                        <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rainfall</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temperature</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Humidity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wind Speed</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sunshine Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weather2023 as $data)
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->date; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->temperature; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->humidity; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->raingauge; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->sunshine; }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $data->windspeed; }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 text-center">
            </div>
            </div>
            </div>
        </div>

        @include('layout.footer')
    </div>
</main>

@endsection