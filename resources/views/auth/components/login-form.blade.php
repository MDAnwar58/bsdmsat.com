<div class="container">
    <div class="row justify-content-center" style="padding: 7rem 0 0 0;">
        <div class="col-lg-4 col-md-5 col-sm-7 col-9">
            <div class="card">
                <h4 class="card-header bg-dark text-light text-center">
                    অ্যাকাউন্ট লগইন করুন
                </h4>

                <form class="card-body">
                    <label for="email">ইমেইল</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="password" class="mt-2">পাসওয়ার্ড</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="text-end">
                        <a href="{{ route('forget.password.page') }}" class=" text-secondary">ফরমেট পাসওয়ার্ড</a>
                    </div>
                    <button type="button" onclick="Login()"
                        class="btn btn-sm btn-dark w-100 text-uppercase mt-2">লগইন</button>
                    <div class=" text-center py-2">
                        <a href="{{ route('register.page') }}">নতুন একটি অ্যাকাউন্ট তৈরি করুন?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
       const Login = async () => { 
            let email = document.getElementById("email").value,
            password = document.getElementById("password").value;
            
            if (email.length === 0) {
                errorToast("Email Required!");
            }else if (password.length === 0) {
                errorToast("Password Required!");
            }else{
                showLoader();
                const response = await axios.post("/login-request", {
                    email:email,
                    password:password,
                });
                hideLoader();
                if (response.data.status === "success") {
                    window.location.href = "/admin/dashboard";
                }else if(response.data.status == "emailError") {
                    errorToast(response.data.message);
                }else if(response.data.status == "passwordError") {
                    errorToast(response.data.message);
                }
            }
        }
    </script>
@endsection
