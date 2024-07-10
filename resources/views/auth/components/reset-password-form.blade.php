<div class="container">
    <div class="row justify-content-center" style="padding: 5rem 0 0 0;">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header bg-dark text-light text-center">
                    আপনার পাসওয়ার্ডটি পরিবর্তন করুন
                </h4>

                <form class="card-body">
                    <label for="email">ইমেইল</label>
                    <input type="email" id="email" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    <label for="password">নতুন পাসওয়ার্ড</label>
                    <input type="password" id="password" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    <label for="password" class="mt-2">কনফার্ম পাসওয়ার্ড</label>
                    <input type="password" id="password_confirmation" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    <button type="button" onclick="ResetPassword()"
                        class="btn btn-sm btn-dark w-100 text-uppercase mt-2">রিসেট পাসওয়ার্ড</button>
                </form>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        const ResetPassword = async () => {
            let email = document.getElementById("email").value;
            newPassword = document.getElementById("password").value;
            passwordConfirmation = document.getElementById("password_confirmation").value;
            if (email.length === 0) {
                errorToast("Email Required!");
            } else if (newPassword.length === 0) {
                errorToast("New Password Required!");
            } else if (newPassword.length < 5) {
                errorToast("New Password Min 5 Character!");
            } else if (passwordConfirmation.length === 0) {
                errorToast("Confirm Password Required!");
            } else if (passwordConfirmation.length < 5) {
                errorToast("Confirm Password Min 5 Character!");
            } else if (passwordConfirmation !== newPassword) {
                errorToast("Confirm Password And New Password Not Match!");
            } else {
                showLoader();
                const response = await axios.post('/reset-password-request', {
                    email: email,
                    newPassword: newPassword,
                });
                hideLoader();
                if (response.data.status == "errorEmail") {
                    errorToast(response.data.message);
                } else if (response.data.status == "passwordError") {
                    errorToast(response.data.message);
                } else if (response.data.status == "success") {
                    successToast(response.data.message);
                    window.location.href = "/login";
                }
            }
        }
    </script>
@endsection
