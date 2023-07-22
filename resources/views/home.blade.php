@extends('layout.main')

@section('container')

<main class="main-content position-relative border-radius-lg ">
    @include('layout.navbar')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Rain Gauge</p>
                                    <h5 id="raingauge-monitoring" class="font-weight-bolder">
                                        - -
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-primary text-sm font-weight-bolder">mm</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Wind Speed</p>
                                    <h5 id="windspeed-monitoring" class="font-weight-bolder">
                                        - -
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">m/s</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Temperature</p>
                                    <h5 id="temperature-monitoring" class="font-weight-bolder">
                                        - -
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">&degC</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Humidity</p>
                                    <h5 id="humidity-monitoring" class="font-weight-bolder">
                                        - -
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-warning text-sm font-weight-bolder">rH</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mt-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sunshine Duration</p>
                                    <h5 id="sunshine-monitoring" class="font-weight-bolder">
                                        - -
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-warning text-sm font-weight-bolder">hours</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Rain gauge prediction overview</h6>
                    </div>
                    <div class="card-body p-3">
                        <p>Y = -4.5417 + -0.3425X1 + 0.3265X2 + -0.7207X3 + -1.2827X4</p>
                        <p>x1 = Temperature</p>
                        <p>x2 = Humidity</p>
                        <p>x3 = Sunshine duration</p>
                        <p>x4= Wind speed</p>
                        <p>Y prediction = <b id="prediction-monitoring">- -</b></p>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
</main>

<script>
    // Fungsi untuk monitoring IoT
    function updateUsers() {
        const xhr = new XMLHttpRequest();
        // xhr.open('GET', 'https://imayalogger.000webhostapp.com/api_sensor.php', true);
        xhr.open('GET', 'https://sub.sicuanrenda.my.id/api_sensor.php', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);

                const raingaugeElement = document.getElementById('raingauge-monitoring');
                const windspeedElement = document.getElementById('windspeed-monitoring');
                const temperatureElement = document.getElementById('temperature-monitoring');
                const humidityElement = document.getElementById('humidity-monitoring');
                const sunshineElement = document.getElementById('sunshine-monitoring');
                const predictionElement = document.getElementById('prediction-monitoring');
                
                raingaugeElement.innerHTML = data.raingauge[0].value;
                windspeedElement.innerHTML = data.anemometer[0].value;
                temperatureElement.innerHTML = data.temperature[0].value;
                humidityElement.innerHTML = data.humidity[0].value;
                sunshineElement.innerHTML = data.uvintensity[0].value;
                let prediction = 0;
                prediction = -4.5417 + -0.3425*parseFloat(data.temperature[0].value) + 0.3265*parseFloat(data.humidity[0].value) + -0.7207*parseFloat(data.temperature[0].value) + -1.2827*parseFloat(data.uvintensity[0].value);
                predictionElement.innerHTML = prediction;
            }
        };

        xhr.send();
    }

    // Memperbarui data pengguna setiap 1 detik
    setInterval(updateUsers, 1000);
</script>

@endsection