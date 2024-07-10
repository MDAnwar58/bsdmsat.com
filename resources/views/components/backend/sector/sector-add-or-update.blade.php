<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-sm-8 col-11" id="topbarColumn"></div>
    </div>
</div>

@section('script')
    <script>
        // $('#img').dropify({});

        const getList = async () => {
            let topbarColumn = $('#topbarColumn');

            topbarColumn.empty();

            showLoader();
            const response = await axios.get('/admin/sector-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(member, index) {
                    let row = `<div class="card">
                <h4 class="card-header text-center">প্রতিষ্ঠানের বিভিন্ন সেক্টর এবং সংখ্যা আপডেট</h4>
                <div class="card-body">
                    
                    <input type="hidden" id="id" value="${member.id}" />
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="sName" value="${member.sName}" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="student_count" placeholder="member" class=" form-control" value="${member.student_count}">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="tName" value="${member.tName}" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="teacher_count" placeholder="member" class=" form-control" value="${member.teacher_count}">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="aName" value="${member.aName}" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="authority_count" placeholder="member" class=" form-control" value="${member.authority_count}">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="bName" value="${member.bName}" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="book_count" placeholder="member" class=" form-control" value="${member.book_count}">
                        </div>
                    </div>
                    <button type="button" onclick="Update()" class="btn btn-sm btn-dark w-100">আপডেট করুন</button>
                </div>
            </div>`;
                    topbarColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                <h4 class="card-header text-center">প্রতিষ্ঠানের বিভিন্ন সেক্টর এবং সংখ্যা এ্যাড</h4>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="sName" value="ছাত্র" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="student_count" placeholder="সংখ্যা" class=" form-control">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="tName" value="শিক্ষক" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="teacher_count" placeholder="সংখ্যা" class=" form-control">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="aName" value="কতৃপক্ষ" class=" form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="authority_count" placeholder="সংখ্যা" class=" form-control">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-8">
                            <input type="text" id="bName" class=" form-control" value="বই">
                        </div>
                        <div class="col-4">
                            <input type="text" id="book_count" placeholder="সংখ্যা" class=" form-control">
                        </div>
                    </div>
                    <button type="button" onclick="Add()" class="btn btn-sm btn-dark w-100">এ্যাড করুন</button>
                </div>
            </div>`;
                topbarColumn.append(row);
            }
        }
        getList();

        async function Add() {
            let sName = document.getElementById('sName').value,
                student_count = document.getElementById('student_count').value,
                tName = document.getElementById('tName').value,
                teacher_count = document.getElementById('teacher_count').value,
                aName = document.getElementById('aName').value,
                authority_count = document.getElementById('authority_count').value,
                bName = document.getElementById('bName').value,
                book_count = document.getElementById('book_count').value;

            if (sName.length === 0) {
                errorToast("ছাত্র বাসান!");
            } else if (student_count.length === 0) {
                errorToast("ছাত্র সংখ্যা বাসান!");
            } else if (tName.length === 0) {
                errorToast("শিক্ষক বাসান!");
            } else if (teacher_count.length === 0) {
                errorToast("শিক্ষক সংখ্যা বাসান!");
            } else if (aName.length === 0) {
                errorToast("কতৃপক্ষ বাসান!");
            } else if (authority_count.length === 0) {
                errorToast("কতৃপক্ষ সংখ্যা বাসান!");
            } else if (bName.length === 0) {
                errorToast("বই বাসান!");
            } else if (book_count.length === 0) {
                errorToast("বই সংখ্যা বাসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/sector-store-or-update', {
                    sName: sName,
                    student_count: student_count,
                    tName: tName,
                    teacher_count: teacher_count,
                    aName: aName,
                    authority_count: authority_count,
                    bName: bName,
                    book_count: book_count
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }
        }

        async function Update() {
            let id = document.getElementById('id').value,
                sName = document.getElementById('sName').value,
                student_count = document.getElementById('student_count').value,
                tName = document.getElementById('tName').value,
                teacher_count = document.getElementById('teacher_count').value,
                aName = document.getElementById('aName').value,
                authority_count = document.getElementById('authority_count').value,
                bName = document.getElementById('bName').value,
                book_count = document.getElementById('book_count').value;

            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!");
            } else if (sName.length === 0) {
                errorToast("ছাত্র বাসান!");
            } else if (student_count.length === 0) {
                errorToast("ছাত্র সংখ্যা বাসান!");
            } else if (tName.length === 0) {
                errorToast("শিক্ষক বাসান!");
            } else if (teacher_count.length === 0) {
                errorToast("শিক্ষক সংখ্যা বাসান!");
            } else if (aName.length === 0) {
                errorToast("কতৃপক্ষ বাসান!");
            } else if (authority_count.length === 0) {
                errorToast("কতৃপক্ষ সংখ্যা বাসান!");
            } else if (bName.length === 0) {
                errorToast("বই বাসান!");
            } else if (book_count.length === 0) {
                errorToast("বই সংখ্যা বাসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/sector-store-or-update', {
                    id: id,
                    sName: sName,
                    student_count: student_count,
                    tName: tName,
                    teacher_count: teacher_count,
                    aName: aName,
                    authority_count: authority_count,
                    bName: bName,
                    book_count: book_count
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }
        }
        // async function Edit(id)
        // {
        //     const response = await axios.get('/admin/slider-edit/'+id);
        //     $("#id").val(response.data.id)
        //     getDataForUpdate(response.data.img)
        // }

        // function openDeleteModal(id)
        // {
        //     $("#deleteId").val(id);
        // }
    </script>
@endsection
