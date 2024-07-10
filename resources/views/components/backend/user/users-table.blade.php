<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-2  col-12 pe-3 text-lg-start text-center mb-3">
            <label for="" class="">ইউজার অ্যকসেস।</label>
            <div class="row mt-2 justify-content-lg-start justify-content-center">
                <form id="userRowForm" class="col-lg-6 col-md-2 col-3 pb-3"></form>
            </div>
        </div>
        <div class="col-lg-10 col-12">
            <div class="card">
                <h4 class="card-header text-center">ইউজার লিস্ট</h4>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>নাম</th>
                                    <th>ইমেইল</th>
                                    <th>অ্যকসেস</th>
                                    <th>একসান বাটোন</th>
                                </tr>
                            </thead>
                            <tbody id="tableList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        const getUsers = async () => {
            let tableList = $('#tableList');
            let table = $('#table');

            table.DataTable().destroy();
            tableList.empty();

            showLoader();
            const response = await axios.get('/get-users');
            hideLoader();

            response.data[0].forEach((user, index) => {
                if (user['userType'] !== 'admin') {

                    let row = `<tr>
                <td>${index + 1}</td>
                <td>${user['name']}</td>
                <td>${user['email']}</td>
                <td>${user['status'] === "cancel" ? `<button data-id="${user['id']}" class="permissionOrCancel badge editBtn bg-success border-0">Permission</button>` : `<button data-id="${user['id']}" class="permissionOrCancel badge editBtn bg-danger border-0">Cancel</button>`}</td>
                <td>
                    <button data-id="${user['id']}" class="btn deleteBtn border border-1 border-danger text-danger btn-sm bg-transparent">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>    
                </td>
            </tr>`;

                    tableList.append(row);
                }
            });

            $(".permissionOrCancel").on("click", function() {
                let id = $(this).attr('data-id');

                $.get({
                    url: "/permission-or-cancel/" + id,
                    success: function(response) {
                        getUsers();
                        if (response.status === "permission") {
                            successToast(response.successPermission);
                        } else {
                            errorToast(response.successCancel);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            });

            let deleteBtn = document.querySelector('.deleteBtn');
            async function deleteUser() {
                let id = deleteBtn.getAttribute("data-id");
                showLoader();
                const response = await axios.get(`/user-destroy/${id}`);
                hideLoader();
                await getUsers();
            };
            deleteBtn.addEventListener('click', deleteUser);


            table.DataTable({
                order: [
                    [0, 'desc']
                ],
                lengthMenu: [5, 10, 15, 20],
                responsive: true
            });

        }
        getUsers();

        async function getUserRow() {
            let userRowForm = $("#userRowForm");
            userRowForm.empty();
            showLoader();
            const response = await axios.get('/get-users-row');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(userRow, index) {
                    let row = `<input type="hidden" id="userRowId"  value="${userRow.id}">
                    <input type="number" id="userRow" class="form-control focus-ring text-lg-start text-center"
                        style="--bs-focus-ring-color: rgba(var(--bs-secondary-rgb), .25);" value="${userRow.row}">
                    <button type="button" onclick="UserRowUpdate()"
                        class="btn btn-sm btn-outline-dark mt-2">আপডেট</button>`;
                    userRowForm.append(row);
                });
            } else {
                let row = `<input type="number" id="userRow" class="form-control focus-ring text-lg-start text-center"
                        style="--bs-focus-ring-color: rgba(var(--bs-secondary-rgb), .25);">
                    <button type="button" onclick="UserRowAdd()"
                        class="btn btn-sm btn-outline-dark mt-2">এ্যাড</button>`;
                userRowForm.append(row);
            }
        }
        getUserRow();

        const UserRowAdd = async () => {
            let userRow = document.getElementById('userRow').value;
            let userRowForm = document.getElementById('userRowForm');
            if (userRow.length === 0) {
                errorToast("আপনি কয়জন ইউজারকে অ্যাকসেস দিবেন সেই সংখ্যাটি বসান।");
            } else {
                showLoader();
                const response = await axios.post("/set-users-row", {
                    row: userRow
                });
                hideLoader();
                if (response.status === 200) {
                    successToast(response.data.success);
                    localStorage.setItem('userRowId', response.data.row.id);
                    localStorage.setItem('userRow', response.data.row.row);
                    userRowForm.reset();
                    // UserRowInput();
                    await getUserRow();
                }
            }
        }

        const UserRowUpdate = async () => {
            let id = document.getElementById('userRowId').value;
            let userRow = document.getElementById('userRow').value;
            let userRowForm = document.getElementById('userRowForm');
            if (userRow.length === 0) {
                errorToast("আপনি কয়জন ইউজারকে অ্যাকসেস দিবেন সেই সংখ্যাটি বসান।");
            }else {
                showLoader();
                const response = await axios.post("/set-users-row", {
                    id: id,
                    row: userRow
                });
                hideLoader();
                if (response.status === 200) {
                    successToast(response.data.success);
                    localStorage.setItem('userRow', response.data.row.row);
                    userRowForm.reset();
                    await getUserRow();
                }
            }
        }

        function RemoveUserROw() {
            var userRowCount = @json($userRowCount);
            if (userRowCount === 0) {
                localStorage.removeItem('userRowId');
                localStorage.removeItem('userRow');
            }
        }
        RemoveUserROw();
    </script>
@endsection
