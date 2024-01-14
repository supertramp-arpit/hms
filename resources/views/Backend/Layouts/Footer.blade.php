	<!--======== SCRIPT FILES =========-->
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/materialize.min.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>
	<script src="{{asset('/js/exportTable.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script>
    $(document).ready(function() {
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            console.log(url);
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

    });
  </script>
  <script type="text/JavaScript">
        $("#JSON").on("click", function () {
            console.log("Json file download")
            $("#example").tableHTMLExport({
                type: 'json',
                filename: 'Data.json'
            });
        });

        $("#PDF").on("click", function () {
            console.log("pdf file download")
            $("#example").tableHTMLExport({
                type: 'pdf',
                filename: 'data.pdf'
            });
        });

        $("#CSV").on("click", function () {
            console.log("csv file download")
            $("#example").tableHTMLExport({
                type: 'csv',
                filename: 'Data.csv'
            });
        });
    </script>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>

<script>
    function toggleStateDropdown() {
    var dropdown = document.getElementById("stateDropdown");
    if (dropdown.style.display === "none") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}

function selectState(stateId, stateName) {
    var selectedState = document.getElementById("selectedState");
    var stateInput = document.getElementById("selectedStateInput");

    selectedState.innerText = stateName;
    stateInput.value = stateId;

    toggleStateDropdown();
}


    </script>


<script>
        $(document).ready(function () {
            // Populate states dropdown initially on page load
            $.ajax({
                url: "{{ URL('/get-states') }}",
                method: "GET",
                dataType: 'json',
                success: function (data) {
                    var options = '<option value="" disabled selected>Select State</option>';
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                    $('#state').html(options);
                }
            });
        });

        function toggleCityDropdown() {
            var cityDropdown = document.getElementById('cityDropdown');
            cityDropdown.style.display === 'none' ? cityDropdown.style.display = 'block' : cityDropdown.style.display = 'none';
        }

        $(document).on('change', '#state', function () {
            var stateId = $(this).val();
            var cityDropdown = $('#cityDropdown');
            cityDropdown.empty();
            $.ajax({
                url: "{{ URL('/get-cities') }}",
                method: "GET",
                data: {
                    "state_id": stateId,
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    var options = '';
                    for (var i = 0; i < data.length; i++) {
                        options += '<div onclick="selectCity(' + data[i].id + ', \'' + data[i].name + '\')">' + data[i].name + '</div>';
                    }
                    cityDropdown.html(options);
                }
            });
        });

        function selectCity(cityId, cityName) {
            $('#selectedCity').text(cityName);
            $('#selectedCityInput').val(cityId);
            toggleCityDropdown();
        }
    </script>


  <script>
    $(document).ready(function() {
            $('.delete-image-icon').on('click', function() {
                const imageId = $(this).data('image-id');

                // Example: Show confirmation dialog before deletion
                if (confirm("Are you sure you want to delete this image?")) {
                    // Perform AJAX request to delete the image
                    $.ajax({
                        url: '/delete-hotel-image/' + imageId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Remove the image container from the DOM on successful deletion
                            $(`[data-image-id="${imageId}"]`).closest('.image-container').remove();
                        },
                        error: function(xhr) {
                            // Handle errors if any
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });</script>
