<div class="container">
    <div class="row justify-content-center" style="padding: 10rem 0 0 0;">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header bg-dark text-light text-center">
                    আপনার অ্যাকাউন্টি ভেরিফাই করুন
                </h4>

                <form id="forget-form" class="card-body">
                    <div class="text-center d-none" id="msg">
                        <span class=" bg-success text-light px-2 py-1 rounded-circle">&check;</span>
                        <p class=" text-muted">Please check your email <b>hello@gmail.com</b></p>
                    </div>
                    <label for="email">ইমেইল</label>
                    <input type="email" id="email" class="form-control focus-ring"
                        style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .25)">
                    {{-- @error('email')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror --}}
                    <button type="button" onclick="ForgetPassword()"
                        class="btn btn-sm btn-dark w-100 text-uppercase mt-2">সেন্ড</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        const ForgetPassword = async () => {
            let email = document.getElementById('email').value;
            if (email.length === 0) {
                errorToast("Email Required!");
            } else {
                showLoader();
                const response = await axios.post('/send-email-for-password-reset', {
                    email: email
                });
                hideLoader();
                console.log(response)
                if (response.status === 200 || response.data.status === "success") {
                    let forgetForm = document.getElementById('forget-form');
                    let msg = document.getElementById('msg');
                    let emailShow = document.querySelector('#msg p b');
                    msg.classList.remove('d-none');
                    emailShow.innerText = response.data.email;
                    forgetForm.reset();
                } else {
                    errorToast("Email Not Found!");
                }
            }
        }
    </script>
@endsection
