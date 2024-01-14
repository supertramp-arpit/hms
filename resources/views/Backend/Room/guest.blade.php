@extends('Backend.Layouts.Main')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <!-- Alerts if any -->
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>All Guests</h4>
                        <form action="{{ route('guests.index') }}" method="GET" class="mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by Hotel Name" name="search">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>


                        <!-- Dropdown for actions -->
                        <div class="dropdown" style="margin-bottom: 15px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="exportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="exportDropdown">
                                <a class="dropdown-item" href="#" onclick="exportToCsv()">Export to CSV</a><br />
                                <a class="dropdown-item" href="#" onclick="exportToPdf()">Export to PDF</a>
                            </div>
                        </div>
                                       </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Profile Picture</th> <!-- Moved profile picture column -->
                                        <th>Name</th>
                                        <th>ID Proof</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Booking Detailes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $serialNumber = 1 @endphp
                                    @foreach($guests as $guest)
                                        <tr>
                                            <td>{{ $serialNumber++ }}</td>
                                            <td>
                                                @php
                                                    $profilePicture = $guest->profile_picture;
                                                    $isGoogleProfile = strpos($profilePicture, 'lh3.googleusercontent.com') !== false;
                                                @endphp
                                                <div style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%; margin: auto; text-align: center; line-height: 50px;">
                                                    @if($profilePicture && $isGoogleProfile)
                                                        <img src="{{ $profilePicture }}" alt="{{ $guest->name }}'s Profile Picture" class="profile-picture rounded-circle img-thumbnail" style="width: 100%; height: auto;">
                                                    @elseif($profilePicture && !$isGoogleProfile)
                                                        <img src="{{ asset('Cms/Roomimage/' . basename($profilePicture)) }}" alt="{{ $guest->name }}'s Profile Picture" class="profile-picture rounded-circle img-thumbnail" style="width: 100%; height: auto;">
                                                    @else
                                                        N/A
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ ucwords($guest->name) }}</td>

                                            <td>{{ $guest->id_proof }}</td>
                                            <td>{{ $guest->email }}</td>
                                            <td>{{ $guest->mobile }}</td>
                                            <td>
                                               <center> <a href="{{ route('guest.bookings', ['guestId' => $guest->id]) }}" ><i class="fa fa-home" aria-hidden="true"></i></a></center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination custom-pagination">
                                <style>
                                    /* Use a more specific class */
                                    .custom-pagination ul.pagination {
                                        font-size: 180px;
                                        margin-left: 800px;
                                        /* Add other styles as needed */
                                    }
                                </style>

                                @if($totalPages > 1)
                                    <ul class="pagination">
                                        @for($i = 1; $i <= $totalPages; $i++)
                                            <li class="page-item {{ ($currentPage == $i) ? 'active' : '' }}">
                                                <a class="page-link" href="{{ route('guests.index', ['page' => $i]) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    // Function to export data to CSV
    function exportToCsv() {
        const table = document.getElementById('example');
        const rows = table.querySelectorAll('tr');
        let csv = [];

        for (let i = 0; i < rows.length; i++) {
            const row = [], cols = rows[i].querySelectorAll('td, th');
            for (let j = 0; j < cols.length; j++)
                row.push(cols[j].innerText);
            csv.push(row.join(','));
        }

        downloadCsv(csv.join('\n'), 'guest_list.csv');
    }

    // Function to download CSV
    function downloadCsv(csv, filename) {
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        saveAs(blob, filename);
    }

    // Function to export data to PDF
    function exportToPdf() {
        const pdf = new jsPDF();
        pdf.autoTable({ html: '#example' });
        pdf.save('guest_list.pdf');
    }
</script>

@section('styles')
<style>
    .sb2-2-3 .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Adjust height as needed */
    }

    .sb2-2-3 .table {
        border-collapse: collapse;
        width: 80%; /* Adjust width as needed */
        border: 1px solid #ccc;
    }

    .sb2-2-3 .table th,
    .sb2-2-3 .table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .sb2-2-3 .table th {
        background-color: #f2f2f2;
    }
</style>
@endsection
