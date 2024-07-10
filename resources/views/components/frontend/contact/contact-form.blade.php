<section class="constact-page-bg py-5">
    <div class="container">
        @if ($contacts->count() > 0)
            @foreach ($contacts as $contact)
                <div class="row justify-content-center">
                    <div class="col-md-12 pb-3">
                        <h2 class="text-uppercase text-center">{{ $contact->title }}</h2>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 pb-lg-0 pb-2">
                                <p class="text-secondary">{{ $contact->des }}</p>
                            </div>
                            @if ($contactPlaceholders->count() > 0)
                                @foreach ($contactPlaceholders as $contactPlaceholder)
                                    <form id="contact-form" class="col-lg-8 col-md-12">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <input type="text" id="name"
                                                    placeholder="{{ $contactPlaceholder->name }}"
                                                    class="form-control mb-2">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="phone" class="form-control"
                                                    placeholder="{{ $contactPlaceholder->mobile }}">
                                            </div>
                                        </div>
                                        <input type="text" id="subject" class="form-control mb-2"
                                            placeholder="{{ $contactPlaceholder->subject }}">
                                        <textarea id="msg" rows="4" class="form-control mb-2" placeholder="{{ $contactPlaceholder->details }}"></textarea>
                                        <button type="button" onclick="sendContactMsg()"
                                            class="btn btn-sm w-100 btn-dark text-uppercase">সেন্ড করুন</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

<script>
    async function sendContactMsg() {
        let contactForm = document.getElementById("contact-form"),
            name = document.getElementById("name").value,
            mobile = document.getElementById("phone").value,
            subject = document.getElementById("subject").value,
            msg = document.getElementById("msg").value;
        console.log(mobile);
        if (name.length === 0) {
            errorToast("আপনার নামটি বাসান");
        } else if (mobile.length === 0) {
            errorToast("আপনার মোবাইল নাম্বার বাসান");
        } else if (mobile.length < 11) {
            errorToast("আপনার মোবাইল নাম্বারটি ১১ সংখ্যার হবে");
        } else if (mobile.length > 11) {
            errorToast("আপনার মোবাইল নাম্বারটি ১১ সংখ্যার বেশি হবে না");
        } else if (subject.length === 0) {
            errorToast("আপনার কি সমস্যার সেই বিষয়টি‌ লিখুন");
        } else if (msg.length === 0) {
            errorToast("বিষয়টি‌ বিস্তারিত লিখুন");
        } else {
            const repsonse = await axios.post("/কনট্যাক্ট/request", {
                name: name,
                mobile: mobile,
                subject: subject,
                msg: msg
            });

            if (repsonse.status === 200) {
                successToast(repsonse.data.message);
                contactForm.reset();
            }
        }
    }
</script>
