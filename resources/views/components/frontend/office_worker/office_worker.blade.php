
@section('css')
    <style>
        .office_worker-show-page-bg img {
            height: 38vh;
            width: 100%;
        }

        @media only screen and (max-width: 575px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 10rem;
            }

            .office_worker-show-page-bg img {
                height: 33vh;
            }
        }

        @media only screen and (max-width: 560px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 8rem;
            }
        }
        
        @media only screen and (max-width: 500px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 7rem;
            }
        }
        
        @media only screen and (max-width: 450px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 5rem;
            }
        }

        @media only screen and (max-width: 425px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 4rem;
            }
        }

        @media only screen and (max-width: 375px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 3rem;
            }
        }

        @media only screen and (max-width: 320px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 2rem;
            }
        }

        @media only screen and (max-width: 320px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 1rem;
            }
        }

        @media only screen and (max-width: 245px) {
            .office_worker-show-page-bg .office_worker-column {
                padding: 0 0;
            }
        }
    </style>
@endsection
<section class="office_worker-show-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center">অফিস কর্মচারি গন</h2>
            </div>
            <div class="col-md-12">
                <div class="row office_worker_row">
                    @if ($officeWorkers->count() > 0)
                        @foreach ($officeWorkers as $officeWorker)
                            <div class="col-lg-3 col-md-4 office_worker-column mb-3">
                                <div class="card">
                                    <div class="card">
                                        <img src="{{ url('upload/images/office_worker', $officeWorker->img) }}" class="card-img-top" alt="teacher">
                                        <div class="card-body">
                                            <span class="h5">{{ $officeWorker->name }}</span><br>
                                            <span
                                                class="card-text text-capitalize">{{ $officeWorker->position }}</span><br>
                                            <div class="pt-2">
                                                <a href="{{ route('office.worker.show', $officeWorker->id) }}"
                                                    class="btn btn-outline-dark btn-sm">বিস্তারিত</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <span class="h5">কোনো অফিস কর্মচারির তথ্য নেই</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
