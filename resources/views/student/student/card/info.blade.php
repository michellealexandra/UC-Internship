{{-- ini yang nunjukin general information dari student  --}}
<div class="col-12 col-xl-8">
    <div class="card card-body bg-white border-light shadow-sm mb-4">
        <h2 class="h4 mb-4">General information</h2>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="full_name">Full Name</label>
                        <h2 class="h5 mb-4">{{ $user->detailable->name }}</h2>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="nim">NIM</label>
                        <h2 class="h5 mb-4">{{ $user->detailable->nim }}</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <label for="email"><span class="fa fa-envelope"></span> E-Mail</label>
                    <h2 class="h5 mb-4">{{ $user->detailable->email }}</h2>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email"><span class="fab fa-whatsapp"></span> Phone Number</label>
                    <h2 class="h5 mb-4">{{ $user->detailable->phone }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email"><span class="fab fa-line"></span> Line</label>
                    <h2 class="h5 mb-4">{{ $user->detailable->line_account }}</h2>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email"><span class="fa fa-book"></span> Scholarship</label>
                    <h2 class="h5 mb-4">{{ $user->info->scholarship->name }}
                        ({{ $user->info->scholarship->grade }})</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email"><span class="fa fa-clock"></span> Time Remaining</label>
                    <h2 class="h5 mb-4">{{ $user->info->time_remaining }} Hours</h2>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email"><span class="fa fa-graduation-cap"></span> GPA</label>
                    <h2 class="h5 mb-4"> {{ number_format((float)$user->info->gpa, 2, '.', '') }}</h2>
                </div>
            </div>
        </form>
    </div>
</div>
