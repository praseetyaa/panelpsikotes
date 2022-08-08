@extends('layouts/admin/main')

@section('title', 'Data Hasil Tes: '.$result->user->name)

@section('content')

<div class="d-sm-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-2 mb-sm-0">Data Hasil Tes</h1>
    <a href="#" class="btn btn-sm btn-primary btn-print"><i class="bi-printer me-1"></i> Cetak</a>
</div>
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">Profil</h5></div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 py-1">
                        <span class="d-block fw-bold">Nama:</span>
                        <span class="d-block">{{ $result->user->name }}</span>
                    </li>
                    <li class="list-group-item px-0 py-1">
                        <span class="d-block fw-bold">Usia:</span>
                        <span class="d-block">{{ generate_age($result->user->attribute->birthdate, $result->created_at).' tahun' }}</span>
                    </li>
                    <li class="list-group-item px-0 py-1">
                        <span class="d-block fw-bold">Jenis Kelamin:</span>
                        <span class="d-block">{{ gender($result->user->attribute->gender) }}</span>
                    </li>
                    <li class="list-group-item px-0 py-1">
                        <span class="d-block fw-bold">Jabatan:</span>
                        <span class="d-block">{{ $result->user->attribute->position->name }}</span>
                    </li>
                    <li class="list-group-item px-0 py-1">
                        <span class="d-block fw-bold">Role:</span>
                        <span class="d-block">{{ $result->user->role->name }}</span>
                    </li>
                    <li class="list-group-item px-0 py-1">
                        <span class="d-block fw-bold">Tes:</span>
                        <span class="d-block">{{ $result->test->name }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">Hasil Tes</h5></div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="graph-tab" data-bs-toggle="tab" data-bs-target="#graph" type="button" role="tab" aria-controls="graph" aria-selected="true">Grafik</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Deskripsi</button>
                    </li>
                    @if(array_key_exists('answers', $result->result))
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="answer-tab" data-bs-toggle="tab" data-bs-target="#answer" type="button" role="tab" aria-controls="answer" aria-selected="false">Jawaban</button>
                    </li>
                    @endif
                </ul>
                <div class="tab-content p-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="graph" role="tabpanel" aria-labelledby="graph-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-auto">
                                <div class="row">
                                    <div class="col-auto mx-auto">
                                        @php
                                            $disc = ['D', 'I', 'S', 'C', '*'];
                                        @endphp
                                        <table class="table-bordered">
                                            <thead bgcolor="#bebebe">
                                                <tr>
                                                    <th width="40">#</th>
                                                    @foreach($disc as $letter)
                                                    <th width="40">{{ $letter }}</th>
                                                    @endforeach
                                                    <th width="40">Tot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td align="center" bgcolor="#bebebe"><strong>1</strong></td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['dm'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['im'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['sm'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['cm'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['bm'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">24</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#bebebe"><strong>2</strong></td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['dl'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['il'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['sl'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['cl'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $result->result['bl'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">24</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#bebebe"><strong>3</strong></td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $differenceArray['D'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $differenceArray['I'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $differenceArray['S'] }}</td>
                                                    <td align="center" bgcolor="#eeeeee">{{ $differenceArray['C'] }}</td>
                                                    <td align="center" bgcolor="#333"></td>
                                                    <td align="center" bgcolor="#333"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl mt-3 mt-xl-0 mx-auto">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-center mb-0 fw-bold">Mask Public Self</p>
                                        <p class="text-center mb-0 fw-bold">MOST</p>
                                        <canvas class="mt-3" id="mostChart" width="100" height="150"></canvas>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center mb-0 fw-bold">Core Private Self</p>
                                        <p class="text-center mb-0 fw-bold">LEAST</p>
                                        <canvas class="mt-3" id="leastChart" width="100" height="150"></canvas>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center mb-0 fw-bold">Mirror Perceived Self</p>
                                        <p class="text-center mb-0 fw-bold">CHANGE</p>
                                        <canvas class="mt-3" id="changeChart" width="100" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        @php
                                            $karakteristik1 = explode(', ', $description->description[$index['most'][0]]['karakteristik']);
                                        @endphp
                                        <h5>Mask Public Self</h5>
                                        <p class="fw-bold">{{ $description->description[$index['most'][0]]['tipe'] }}</p>
                                        <p>
                                            <ul>
                                            @foreach($karakteristik1 as $karakter)
                                                <li>{{ $karakter }}</li>
                                            @endforeach
                                            </ul>
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        @php
                                            $karakteristik2 = explode(', ', $description->description[$index['least'][0]]['karakteristik']);
                                        @endphp
                                        <h5>Core Private Self</h5>
                                        <p class="fw-bold">{{ $description->description[$index['least'][0]]['tipe'] }}</p>
                                        <p>
                                            <ul>
                                            @foreach($karakteristik2 as $karakter)
                                                <li>{{ $karakter }}</li>
                                            @endforeach
                                            </ul>
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        @php
                                            $karakteristik3 = explode(', ', $description->description[$index['change'][0]]['karakteristik']);
                                        @endphp
                                        <h5>Mirror Perceived Self</h5>
                                        <p class="fw-bold">{{ $description->description[$index['change'][0]]['tipe'] }}</p>
                                        <p>
                                            <ul>
                                            @foreach($karakteristik3 as $karakter)
                                                <li>{{ $karakter }}</li>
                                            @endforeach
                                            </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h5>Deskripsi Kepribadian</h5>
                                        <p class="text-justify">{{ $description->description[$index['change'][0]]['deskripsi'] }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h5>Job Match</h5>
                                        <p class="text-justify">{{ $description->description[$index['change'][0]]['job'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(array_key_exists('answers', $result->result))
                    <div class="tab-pane fade" id="answer" role="tabpanel" aria-labelledby="answer-tab">
                        <div class="row">
                            @for($i=1; $i<=3; $i++)
                            <div class="col-md-4 mb-2 mb-md-0">
                                <table class="table-bordered">
                                    <thead bgcolor="#bebebe">
                                        <tr>
                                            <th width="40">#</th>
                                            <th width="40">Most</th>
                                            <th width="40">Least</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($j=(($i-1)*8)+1; $j<=$i*8; $j++)
                                        <tr>
                                            <td align="center" bgcolor="#bebebe"><strong>{{ $j }}</strong></td>
                                            <td align="center" bgcolor="#eeeeee">{{ $result->result['answers']['m'][$j] }}</td>
                                            <td align="center" bgcolor="#eeeeee">{{ $result->result['answers']['l'][$j] }}</td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            @endfor
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form-print" class="d-none" method="post" action="{{ route('admin.result.print') }}" target="_blank">
    @csrf
    <input type="hidden" name="mostChartImage" id="mostChartImage">
    <input type="hidden" name="leastChartImage" id="leastChartImage">
    <input type="hidden" name="changeChartImage" id="changeChartImage">
    <input type="hidden" name="name" value="{{ $result->user->name }}">
    <input type="hidden" name="age" value="{{ generate_age($result->user->attribute->birthdate, $result->created_at).' tahun' }}">
    <input type="hidden" name="gender" value="{{ gender($result->user->attribute->gender) }}">
    <input type="hidden" name="position" value="{{ $result->user->attribute->position->name }}">
    <input type="hidden" name="test" value="{{ $result->test->name }}">
    <input type="hidden" name="path" value="{{ $result->test->code }}">
    <input type="hidden" name="packet_id" value="{{ $result->packet_id }}">
    <input type="hidden" name="result" value="{{ json_encode($result->result) }}">
    <input type="hidden" name="differenceArray" value="{{ json_encode($differenceArray) }}">
    <input type="hidden" name="index" value="{{ json_encode($index) }}">
</form>

@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function generateMostChart(){
        var url = mostChart.toBase64Image();
        document.getElementById("mostChartImage").value = url;
    }

    function generateLeastChart(){
        var url = leastChart.toBase64Image();
        document.getElementById("leastChartImage").value = url;
    }

    function generateChangeChart(){
        var url = changeChart.toBase64Image();
        document.getElementById("changeChartImage").value = url;
    }

    var ctx1 = document.getElementById('mostChart').getContext('2d');
    var mostChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['D', 'I', 'S', 'C'],
            datasets: [{
                label: 'Score',
                data: [{{ $graph[1]['D'] }}, {{ $graph[1]['I'] }}, {{ $graph[1]['S'] }}, {{ $graph[1]['C'] }}],
                fill: false,
                backgroundColor: '#FF6B8A',
                borderColor: '#FF6B8A',
                lineTension: 0
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        min: -8,
                        max: 8,
                        stepSize: 2
                    }
                }]
            },
            bezierCurve : false,
            animation: {
                onComplete: generateMostChart
            }
        }
    });

    var ctx2 = document.getElementById('leastChart').getContext('2d');
    var leastChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['D', 'I', 'S', 'C'],
            datasets: [{
                label: 'Score',
                data: [{{ $graph[2]['D'] }}, {{ $graph[2]['I'] }}, {{ $graph[2]['S'] }}, {{ $graph[2]['C'] }}],
                fill: false,
                backgroundColor: '#fd7e14',
                borderColor: '#fd7e14',
                lineTension: 0
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        min: -8,
                        max: 8,
                        stepSize: 2
                    }
                }]
            },
            bezierCurve : false,
            animation: {
                onComplete: generateLeastChart
            }
        }
    });

    var ctx3 = document.getElementById('changeChart').getContext('2d');
    var changeChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['D', 'I', 'S', 'C'],
            datasets: [{
                label: 'Score',
                data: [{{ $graph[3]['D'] }}, {{ $graph[3]['I'] }}, {{ $graph[3]['S'] }}, {{ $graph[3]['C'] }}],
                fill: false,
                backgroundColor: '#340369',
                borderColor: '#340369',
                lineTension: 0
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        min: -8,
                        max: 8,
                        stepSize: 2
                    }
                }]
            },
            bezierCurve : false,
            animation: {
                onComplete: generateChangeChart
            }
        }
    });

    $(document).on("click", ".btn-print", function(e) {
        e.preventDefault();
        $("#form-print").submit();
    });
</script>

@endsection

@section('css')

<style type="text/css">
    table tr th, table tr td {padding: .25rem .5rem; text-align: center;}
    .table-identity {min-width: 1000px};
    .deskripsi {border-style: groove;}
    .deskripsi span {font-size: .875rem!important;}
    .deskripsi p {margin-bottom: .5rem;}
</style>

@endsection