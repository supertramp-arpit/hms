<div class="container">
    <div class="d-flex justify-content-center">
        <form id="registrationForm"  class="mt-3" action="{{ route('add_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 style="font-weight: bold; color: white;">Sign Up</h3>

            <div class="row mt-3">
                <div class="col">
                    <label for="name" class="form-label" style="font-size: 14px; color: white;">Name</label>
                    <input type="text" class="form-control shadow-none" id="name" name="name" aria-label="Name">
                </div>
                <div class="col">
                    <label for="id_proof" class="form-label" style="font-size: 14px; color: white;">ID Proof</label>
                    <input type="text" class="form-control shadow-none" id="id_proof" name="id_proof" aria-label="ID Proof">
                </div>
            </div>

            <div class="mt-2">
                <label for="mobile" class="form-label" style="font-size: 14px; color: white;">Phone</label>
                <input type="text" class="form-control shadow-none" id="mobile" name="mobile" aria-label="Phone">
            </div>

            <div class="mt-2">
                <label for="email" class="form-label" style="font-size: 14px; color: white;">Email Address</label>
                <input type="email" class="form-control shadow-none" id="email" name="email" aria-label="Email">
            </div>

            <div class="mt-2">
                <label for="password" class="form-label" style="font-size: 14px; color: white;">Password</label>
                <input type="password" class="form-control shadow-none" id="password" name="password" aria-label="Password">
            </div>

            <div class="mt-2">
                <label for="profile_picture" class="form-label" style="font-size: 14px; color: white;">Profile Picture</label>
                <input type="file" class="form-control shadow-none" id="profile_picture" name="profile_picture" aria-label="Profile Picture">
            </div>

            <div class="mt-2" style="font-size: 14px;">
                <input type="checkbox" id="terms" name="terms" value="accepted">
                <label for="terms" class="ms-2" style="font-size: 16px; color: white;">I have read & accept the Terms and Privacy Policy</label>
            </div>

            <div class="mt-1">
                <button type="submit" class="btn mt-4 w-100" style="background-color: #FE3400; color: white; font-weight: 600;">Sign Up</button>
            </div>
            <div class="mt-2">
                <p class="text-center " style="color: white;">or continue with</p>
            </div>

            <div class="row">
                <div class="d-inline ">
              <div class="text-center p-1">
              <img src="{{asset('user/img/icon/fi.jpeg')}}" style="border-radius:50%;">
              <img src="{{asset('user/img/icon/in.jpeg')}}" style="border-radius:50%;">
              </div>
              </div>

              <p class="text-center  mt-1" style="color:grey;font-weight: bolder;"> Do not have an account ? <span class="" style="color:#FE3400;;font-weight: bolder;" data-bs-toggle="modal" data-bs-target="#exampleModal1" role="button">Login</span></p>


            </div>



            <!-- Other fields and buttons as required -->

        </form>
    </div>
</div>
<script>
    document.getElementById('registrationForm').addEventListener('submit', async (event) => {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: form.method,
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                alert(data.success); // Show success message
                form.reset(); // Optionally reset the form on success
            } else {
                let errors = 'Errors:\n';
                for (const key in data.errors) {
                    errors += `${key}: ${data.errors[key].join(', ')}\n`; // Concatenate error messages
                }
                alert(errors); // Show error messages
            }
        } catch (error) {
            alert('Something went wrong. Please try again.'); // Show a generic error message
        }
    });
</script>
