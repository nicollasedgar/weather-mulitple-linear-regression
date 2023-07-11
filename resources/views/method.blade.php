@extends('layout.main')

@section('container')

<main class="main-content position-relative border-radius-lg ">
    @include('layout.navbar')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Helper Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>1</sub>Y</th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>2</sub>Y</th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>3</sub>Y</th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>4</sub>Y</th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>1</sub>X<sub>2</sub></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>1</sub>X<sub>3</sub></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>1</sub>X<sub>4</sub></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>2</sub>X<sub>3</sub></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>2</sub>X<sub>4</sub></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>3</sub>X<sub>4</sub></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>1</sub><sup>2</sup></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>2</sub><sup>2</sup></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>3</sub><sup>2</sup></th>
                          <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">∑X<sub>4</sub><sup>2</sup></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $temperatureRaingaugeTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $humidityRaingaugeTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $windspeedRaingaugeTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $sunshineRaingaugeTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $temperatureHumidityTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $temperatureWindspeedTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $temperatureSunshineTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $humidityWindspeedTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $humiditySunshineTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $windspeedSunshineTotal }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $totalSquaredTemperature }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $totalSquaredHumidity }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $totalSquaredWindspeed }}</span></td>
                            <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $totalSquaredSunshine }}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 mt-4">
              <div class="card">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0">Matrix Table</h6>
                </div>
                <div class="card-body pt-4 p-3">
                  <ul class="list-group">

                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Matrix A</h6>
                        <table class="table align-items-center mb-0">
                            <tbody>
                              @foreach ($matrixA as $data)
                                  <tr>
                                    @foreach ($data as $item)
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item }}</span></td>
                                    @endforeach
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="ms-auto text-end">
                        <p class="btn btn-link text-dark text-gradient px-3 mb-0">Det.</p>
                        <p class="btn btn-link text-dark px-3 mb-0"><?= $detMatrixA; ?></p>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Matrix A1</h6>
                        <table class="table align-items-center mb-0">
                            <tbody>
                              @foreach ($matrixA1 as $data)
                                  <tr>
                                    @foreach ($data as $item)
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item }}</span></td>
                                    @endforeach
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="ms-auto text-end">
                        <p class="btn btn-link text-dark text-gradient px-3 mb-0">Det.</p>
                        <p class="btn btn-link text-dark px-3 mb-0"><?= $detMatrixA1; ?></p>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Matrix A2</h6>
                        <table class="table align-items-center mb-0">
                            <tbody>
                              @foreach ($matrixA2 as $data)
                                  <tr>
                                    @foreach ($data as $item)
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item }}</span></td>
                                    @endforeach
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="ms-auto text-end">
                        <p class="btn btn-link text-dark text-gradient px-3 mb-0">Det.</p>
                        <p class="btn btn-link text-dark px-3 mb-0"><?= $detMatrixA2; ?></p>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Matrix A3</h6>
                        <table class="table align-items-center mb-0">
                            <tbody>
                              @foreach ($matrixA3 as $data)
                                  <tr>
                                    @foreach ($data as $item)
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item }}</span></td>
                                    @endforeach
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="ms-auto text-end">
                        <p class="btn btn-link text-dark text-gradient px-3 mb-0">Det.</p>
                        <p class="btn btn-link text-dark px-3 mb-0"><?= $detMatrixA3; ?></p>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Matrix A4</h6>
                        <table class="table align-items-center mb-0">
                            <tbody>
                              @foreach ($matrixA4 as $data)
                                  <tr>
                                    @foreach ($data as $item)
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item }}</span></td>
                                    @endforeach
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="ms-auto text-end">
                        <p class="btn btn-link text-dark text-gradient px-3 mb-0">Det.</p>
                        <p class="btn btn-link text-dark px-3 mb-0"><?= $detMatrixA4; ?></p>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Matrix A5</h6>
                        <table class="table align-items-center mb-0">
                            <tbody>
                              @foreach ($matrixA5 as $data)
                                  <tr>
                                    @foreach ($data as $item)
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item }}</span></td>
                                    @endforeach
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="ms-auto text-end">
                        <p class="btn btn-link text-dark text-gradient px-3 mb-0">Det.</p>
                        <p class="btn btn-link text-dark px-3 mb-0"><?= $detMatrixA5; ?></p>
                      </div>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-5 mt-4">
              <div class="card h-40 mb-4">
                <div class="card-body pt-4 p-3">
                  <h6 class="text-uppercase text-dark text-gradient text-body text-xs font-weight-bolder mb-3">Coefficien</h6>
                  <ul class="list-group">

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <span class="text-xs">b0</span>
                            <h6 class="mb-1 text-secondary text-sm">{{ $koefisienb0 }}</h6>
                        </div>
                      </div>  
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <span class="text-xs">b1</span>
                            <h6 class="mb-1 text-secondary text-sm">{{ $koefisienb1 }}</h6>
                        </div>
                      </div>  
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <span class="text-xs">b2</span>
                            <h6 class="mb-1 text-secondary text-sm">{{ $koefisienb2 }}</h6>
                        </div>
                      </div>  
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <span class="text-xs">b3</span>
                            <h6 class="mb-1 text-secondary text-sm">{{ $koefisienb3 }}</h6>
                        </div>
                      </div>  
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                            <span class="text-xs">b4</span>
                            <h6 class="mb-1 text-secondary text-sm">{{ $koefisienb4 }}</h6>
                        </div>
                      </div>  
                    </li>
                    
                  </ul>
                  <h6 class="text-uppercase text-dark text-gradient text-body text-xs font-weight-bolder my-3">Multiple Linear Regression Model</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Y = {{ number_format($koefisienb0,4) }} + {{ number_format($koefisienb1,4) }}X<sub>1</sub> + {{ number_format($koefisienb2,4) }}X<sub>2</sub> + {{ number_format($koefisienb3,4) }}X<sub>3</sub> + {{ number_format($koefisienb4,4) }}X<sub>4</sub></h6>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Weather overview</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout.footer')
    </div>
</main>
@include('layout.chartjs')

@endsection