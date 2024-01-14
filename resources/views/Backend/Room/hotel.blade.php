@extends('Backend.Layouts.Main')

@section('content')

<style>
.sb2-2-3 .table th,
.sb2-2-3 .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #ccc;
    text-transform: capitalize; /* Converts the first character of each word to uppercase */
}


    .pagination-container .pagination {
    margin-top: 20px;
    font-size: 12px; /* Reduce the font size for pagination */
}

/* Optionally, you can adjust padding and margin for pagination links */
.pagination-container .pagination li {
    margin: 0 4px; /* Adjust margin between pagination links */
    padding: 4px 8px; /* Adjust padding for pagination links */
}

    /* Custom styles for the table */
    .sb2-2-3 .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Adjust height as needed */
    }

    .sb2-2-3 .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #333;
        border-collapse: collapse;
    }

    .sb2-2-3 .table th,
    .sb2-2-3 .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #ccc;
    }

    .sb2-2-3 .table th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

    .sb2-2-3 .table tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .sb2-2-3 .table tbody tr:hover {
        background-color: #e9ecef;
    }

</style>
    <div class="sb2-2">
        <ul>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block" style="background-color: rgb(37, 134, 7); color: white; float: right;">
                    <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block" style="background-color: red; color: white; float: right;">
                    <button type="button" class="close" data-dismiss="alert" style="color: #fff">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->has('stars'))
<div class="alert alert-danger">
    {{ $errors->first('stars') }}
</div>
@endif

        </ul>
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>Hotel List</h4>
                            <div class="btn-group export-buttons mt-3">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Export <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="exportToCsv()">Export to CSV</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportToPdf()">Export to PDF</a></li>
                                </ul>
                            </div>

                            <form action="{{ route('hotel') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by Hotel Name" name="search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>

                        </div>

                        <div class="tab-inn">
                            <div class="table-responsive table-desi">
                                <table class="table table-hover table-bordered" id="hotelTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Stars</th>

                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hotels as $hotel)
                                        <tr>
                                            <td>{{ $hotel->id }}</td>
                                            <td>
                                                @if($hotel->images->isNotEmpty())
                                                <img src="{{ asset($hotel->images->first()->image_path) }}" alt="Hotel Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                                @else
                                                    No Image Available
                                                @endif
                                            </td>

                                            <td>{{ $hotel->name }}</td>
                                            <td>{{ $hotel->address }}</td>
                                            <td>
                                                @for ($i = 0; $i < $hotel->stars; $i++)
                                                    <i class="fa fa-star" style="color: gold; background: none; margin-right: -4px;"></i>
                                                @endfor
                                            </td>


                                            <td>
                                                @php
                                                    $cityName = \App\Models\City::find($hotel->city)->name;
                                                @endphp
                                                {{ $cityName }}
                                            </td>
                                            <td class="status-cell" data-hotel-id="{{ $hotel->id }}" data-current-status="{{ $hotel->status }}">
                                                @if($hotel->status == 1)
                                                    <img src="{{ asset('images/on.png') }}" alt="Active" style="width: 50px; height: 50px;">
                                                @else
                                                    <img src="{{ asset('images/off.png') }}" alt="Inactive" style="width: 50px; height: 50px;">
                                                @endif
                                            </td>

                                           <!-- Inside the table body -->
<td>
    <a href="{{ url('edit-hotel').'/'.$hotel->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <a href="#" onclick="deleteHotel('{{ $hotel->id }}')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                                                    <a class="page-link" href="{{ route('hotel', ['page' => $i]) }}">{{ $i }}</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function deleteHotel(hotelId) {
            const confirmation = confirm('Are you sure you want to delete this hotel?');
            if (confirmation) {
                // Perform the deletion via AJAX
                $.ajax({
                    url: "{{ url('delete-hotel').'/' }}" + hotelId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success response, if needed
                        console.log(response);
                        // Reload the page or update the UI accordingly
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle errors if any
                        console.log(xhr.responseText);
                    }
                });
            }
        }
    </script>

    <script>
      $(document).ready(function() {
    $('.status-cell').on('click', function() {
        const hotelId = $(this).data('hotel-id');
        const currentStatus = $(this).data('current-status');

        // Confirmation dialog before changing the status
        const confirmationMessage = (currentStatus === 1) ? 'Are you sure you want to deactivate this hotel?' : 'Are you sure you want to activate this hotel?';
        if (!confirm(confirmationMessage)) {
            return false; // Cancel if the user clicks cancel in the confirmation dialog
        }

        // Perform an AJAX request to toggle the status
        $.ajax({
            url: '/toggle-hotel-status/' + hotelId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: (currentStatus === 1) ? 0 : 1 // Toggle the status
            },
            success: function(response) {
                // Update the UI with the new status
                const statusCell = $(`[data-hotel-id="${hotelId}"]`);
                if (response.status === 1) {
                    statusCell.find('.status-toggle').text('Active').css('color', 'green');
                } else {
                    statusCell.find('.status-toggle').text('Inactive').css('color', 'red');
                }
                statusCell.data('current-status', response.status);

                // Reload the page after status change
                location.reload();
            },
            error: function(xhr) {
                // Handle errors if any
                console.log(xhr.responseText);
            }
        });
    });
});


    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    // Function to export data to CSV
    function exportToCsv() {
        const table = document.getElementById('hotelTable');
        const rows = table.querySelectorAll('tr');

        let csv = [];
        for (let i = 0; i < rows.length; i++) {
            const row = [], cols = rows[i].querySelectorAll('td, th');
            for (let j = 0; j < cols.length; j++)
                row.push(cols[j].innerText);
            csv.push(row.join(','));
        }
        downloadCsv(csv.join('\n'), 'hotel_list.csv');
    }

    // Function to download CSV
    function downloadCsv(csv, filename) {
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        saveAs(blob, filename);
    }

    // Function to export data to PDF
    function exportToPdf() {
        const pdf = new jsPDF();
        pdf.autoTable({ html: '#hotelTable' });
        pdf.save('hotel_list.pdf');
    }
</script>

@endsection


