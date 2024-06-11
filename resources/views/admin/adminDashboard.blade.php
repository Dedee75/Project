@extends('layouts.admindashboardlayout')
@section('admintitle', 'Admin Dashboard')
@section('admindashboardbody')
    <div class="mainDashboard">
        <div>
            <div class="dashboardTitle">
                <i class="fa-solid fa-headphones"></i>
                <p>Dashboard </p>
            </div>
        </div>
        <div class="row-container">
            <div class="first-row">
                <div class="first-row-left">
                    <img src="{{asset('img/nwr.jpg')}}" alt="" width="300px" height="300px">
                    <div>
                        <h3>Aye Mi San</h3>
                        <div>
                            <div class="dsbOne">
                                <i class="fa-solid fa-headphones"></i>
                                <p>ayemi234@gmail.com</p>
                            </div>
                            <div class="dsbOne">
                                <i class="fa-solid fa-headphones"></i>
                                <p>09779953380</p>
                            </div>
                            <div class="dsbOne">
                                <i class="fa-solid fa-headphones"></i>
                                <p>admin</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="first-row-right">
                    <div class="data-box">
                        <h4>Total Sale</h4>
                        <div class="price">
                            <i class="fa-solid fa-headphones"></i>
                            <p>325,3322 $</p>
                        </div>
                    </div>
                    <div class="data-box">
                        <h4>Total Purchase</h4>
                        <div class="price">
                            <i class="fa-solid fa-headphones"></i>
                            <p>{{$totalpurchase}} $</p>
                        </div>
                    </div>
                    <div class="data-box">
                        <h4>Number Of Order</h4>
                        <div class="price">
                            <i class="fa-solid fa-headphones"></i>
                            <p> 231 </p>
                        </div>
                    </div>
                    <div class="data-box">
                        <h4>Number Of Purchase</h4>
                        <div class="price">
                            <i class="fa-solid fa-headphones"></i>
                            <p> {{$numberofpurchase}} </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="second-row">
                <div class="second-row-data-box">

                    <h4>Total Customer</h4>
                    <div class="price">
                        <i class="fa-solid fa-headphones"></i>
                        <p>{{$totalcustomer}}</p>
                    </div>

                </div>

                <div class="second-row-data-box">

                    <h4>In Active Staff</h4>
                    <div class="price">
                        <i class="fa-solid fa-headphones"></i>
                        <p> {{$inactivestaff}} </p>
                    </div>

                </div>

                <div class="second-row-data-box">

                    <h4>Active Staff</h4>
                    <div class="price">
                        <i class="fa-solid fa-headphones"></i>
                        <p>{{$activestaff}}</p>
                    </div>

                </div>

                <div class="second-row-data-box">

                    <h4>Total Supplier</h4>
                    <div class="price">
                        <i class="fa-solid fa-headphones"></i>
                        <p> {{$totalsupplier}} </p>
                    </div>

                </div>
            </div>

            <div class="third-row">
                <div class="third-row-data-box">
                    <canvas id="myChart" style="width:100%;max-width:600px;height:400px"></canvas>
                </div>







                <div class="third-row-data-box">
                    <div id="myPlot" style="width:100%;max-width:700px;height:500px"></div>
                </div>







                <div class="third-row-data-box">
                    <div id="myPlotTwo" style="width:100%;max-width:700px ;height:500px"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        // pie chart start
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: ""
                }
            }
        });
        // pie chart end
        // grap chart start
        const xArray = [55, 49, 44, 24, 15];
        const yArray = ["Italy ", "France ", "Spain ", "USA ", "Argentina "];

        const data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "h",
            marker: {
                color: "rgba(255,0,0,0.6)"
            }
        }];

        const layout = {
            title: ""
        };

        Plotly.newPlot("myPlot", data, layout);
        // grap chart end

        // third Chart Start
        const xArrayLine = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
        const yArrayLine = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

        const lineData = [{
            x: xArrayLine,
            y: yArrayLine,
            mode: "lines"
        }];

        const lineLayout = {
            xaxis: {
                range: [40, 160],
                title: "Square Meters"
            },
            yaxis: {
                range: [5, 16],
                title: "Price in Millions"
            },
            title: ""
        };

        Plotly.newPlot("myPlotTwo", lineData, lineLayout);
        // third Chart End
    </script>
@endsection
