@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card text-bg-primary mb-4">
            <div class="card-body">
                <h4>1,024</h4>
                <p>Total Users</p>
            </div>
        </div>
    </div>
</div>

<canvas id="myChart"></canvas>

<script>
document.addEventListener("DOMContentLoaded", function () {
    new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Revenue',
                data: [120, 190, 300]
            }]
        }
    });
});
</script>

@endsection
