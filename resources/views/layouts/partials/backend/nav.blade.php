<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container d-flex justify-content-between px-sm-0 px-4">
        <div>
            <button type="button" id="manuBtn" onclick="manuToggle()" class="btn btn-sm">
                <i class="fa fa-bars fs-5 text-muted" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand h4 text-muted fs-5" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        </div>
        <ul class="nav">
            {{-- <li class="nav-item position-relative">
                <button role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    class="position-relative mt-2 me-3 border-0" style="background: transparent;">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <span class="position-absolute top-1 translate-middle badge rounded-pill bg-danger"
                        style="font-size: 10px;">
                        <span id="msgCount">0</span>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end" id="UserMessage">

                </ul>
            </li> --}}
            <li class="nav-item btn-group ms-3">
                <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/backend/images/user.png') }}"
                        class="rounded-circle border border-2 border-secondary" style="width: 40px;" alt="">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" id="userNameShow">User Name</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('logout') }}">লগ আউট</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script>
    // async function getMsgCountForNav() {
    //     let msgCount = document.getElementById('msgCount');
    //     const response = await axios.get('/get-local-user-message-count');
    //     msgCount.innerHTML = response.data;
    // }
    // getMsgCountForNav();

    // async function getMessage() {
    //     let UserMessage = $("#UserMessage");
    //     // UserMessage.empty();
    //     const response = await axios.get('/get-local-user-message');
    //     response.data.forEach((localUserMessage, index) => {
    //         let row = `<li>
    //                     <div class="dropdown-item">
    //                         <span class="h6"><a href="" class="text-muted">MD name</a></span> <br>
    //                         <span>Lorem ipsum, dolor sit amet. Lorem ipsum dolor sit amet.</span>
    //                         <span>1d</span>
    //                     </div>
    //                 </li>`;
    //         UserMessage.append(row);
    //     });
    // }
    // getMessage();
    async function getUser()
    {
        let userNameShow = document.getElementById('userNameShow');
        const response = await axios.get('/get-user');
        userNameShow.innerText = response.data.name; 
    }
    getUser();
</script>
