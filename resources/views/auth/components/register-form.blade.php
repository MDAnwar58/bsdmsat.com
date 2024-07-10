<div class="container">
    <div class="row justify-content-center" style="padding: 5rem 0 0 0;">
        <div class="col-lg-4 col-md-5 col-sm-7 col-9">
            <div class="card">
                <h4 class="card-header bg-dark text-light text-center">
                    আপনার অ্যাকাউন্ট তৈরি করুন
                </h4>

                <form class="card-body">
                    <label for="name">সমর্পণ নাম</label>
                    <input type="text" id="name" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <label for="email">ইমেইল</label>
                    <input type="email" id="email" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <label for="password">পাসওয়ার্ড</label>
                    <input type="password" id="password" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <label for="password" class="mt-2">কনফার্ম পাসওয়ার্ড</label>
                    <input type="password" id="password_confirmation" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="button" onclick="Registration()"
                        class="btn btn-sm btn-dark w-100 text-uppercase mt-2">রেজিস্ট্রেশন করুন</button>
                    <div class=" text-center py-2"><a href="{{ route('login.page') }}">অ্যাকাউন্ট থাকলে লগইন করুন?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        // user registration
        const Registration = async () => {
            let name = document.getElementById('name').value,
                email = document.getElementById('email').value,
                password = document.getElementById('password').value,
                password_confirmation = document.getElementById('password_confirmation').value;
            if (name.length === 0) {
                errorToast("Your Enter Your Full Name");
            } else if (email.length === 0) {
                errorToast("Email Required");
            } else if (password.length === 0) {
                errorToast("Password Required");
            } else if (password.length < 5) {
                errorToast("Password Min 5 Character");
            } else if (password_confirmation.length === 0) {
                errorToast("Password Confirmation Required");
            } else if (password_confirmation.length < 5) {
                errorToast("Password Min 5 Character");
            } else if (password_confirmation !== password) {
                errorToast("Password and Confirmation Password Not Match");
            } else {
                showLoader();
                const response = await axios.post("/register-request", {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                });
                hideLoader();

                console.log(response.data);
                if (response.data.status === "email_unique") {
                    errorToast(response.data.message);
                } else if (response.status === 200 && response.data.status === "success") {
                    successToast(response.data.message);
                    window.location.href = "/login";
                } else {
                    errorToast(response.data.message);
                }
            }
        }
    </script>
@endsection
