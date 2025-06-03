@extends('layouts.app')

@section('title', 'Home')

@section('styles')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!-- Lightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Trirong:wght@400;700&display=swap" rel="stylesheet">
<!-- DigiMarkt Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/digimarkt.css') }}">

@endsection

@section('content')
<!-- Marquee Banner -->
<div class="marquee-container">
    <div class="marquee">
        <span class="mx-4">This project has been funded with support from the European Commission under the Erasmus+ Programme</span>
        <span class="mx-4">•</span>
        <span class="mx-4">Project Reference: 609096-EPP-1-2019-1-DE-EPPKA2-CBHE-JP</span>
        <span class="mx-4">•</span>
        <span class="mx-4">Co-funded by the European Union with a total funding of €394,185.00</span>
    </div>
</div>

<!-- Main Carousel -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/carousel/carousel-1.svg') }}" class="d-block w-100" alt="DigiMarkt Project">
            <div class="carousel-caption d-none d-md-block">
                <h5>DigiMarkt Project Launch</h5>
                <p>Official launch of the Digital Marketing in TVET Project</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/carousel/carousel-2.svg') }}" class="d-block w-100" alt="Training Session">
            <div class="carousel-caption d-none d-md-block">
                <h5>Digital Marketing Training</h5>
                <p>Training sessions for TVET teachers and students</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/carousel/carousel-3.svg') }}" class="d-block w-100" alt="Project Meeting">
            <div class="carousel-caption d-none d-md-block">
                <h5>Project Coordination Meeting</h5>
                <p>Partners meeting to discuss project progress</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/carousel/carousel-1.svg') }}" class="d-block w-100" alt="Digital Marketing Lab">
            <div class="carousel-caption d-none d-md-block">
                <h5>Digital Marketing Laboratory</h5>
                <p>State-of-the-art facilities for practical training</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/carousel/carousel-2.svg') }}" class="d-block w-100" alt="Workshop">
            <div class="carousel-caption d-none d-md-block">
                <h5>Digital Marketing Workshop</h5>
                <p>Hands-on workshop for TVET students</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/carousel/carousel-3.svg') }}" class="d-block w-100" alt="Graduation">
            <div class="carousel-caption d-none d-md-block">
                <h5>Graduation Ceremony</h5>
                <p>Celebrating successful completion of training programs</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Project Summary -->
<section class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="mb-4">DigiMarkt Project</h2>
            <p class="lead">Towards Digital Marketing in Technical and Vocational Education and Training (TVET) in Ghana</p>
            <p>The DigiMarkt project aims to enhance the digital readiness of TVET graduates by incorporating digital marketing skills into the curriculum. This initiative is co-funded by the European Union under the Erasmus+ Programme.</p>
            <p>The project brings together expertise from European and Ghanaian institutions to develop comprehensive training materials, establish digital marketing laboratories, and train TVET teachers and students in modern digital marketing techniques.</p>
            <div class="mt-4">
                <a href="{{ route('about') }}" class="btn btn-digimarkt">Learn More</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/digimarkt-logo.svg') }}" alt="DigiMarkt Logo" class="img-fluid rounded shadow-sm">
        </div>
    </div>
</section>

<!-- Project Objectives -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Project Objectives</h2>
                <p class="lead">Our mission is to enhance digital marketing skills in TVET education</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('assets/images/objectlogo.svg') }}" alt="Project Objectives" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Key Objectives</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Support teachers with digital marketing skills
                            </li>
                            <li class="list-group-item bg-transparent">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Improve competences of TVET learners in digital marketing
                            </li>
                            <li class="list-group-item bg-transparent">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Set up digital marketing laboratory in partner institutions
                            </li>
                            <li class="list-group-item bg-transparent">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Enhance digital readiness of TVET graduates for the job market
                            </li>
                            <li class="list-group-item bg-transparent">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Develop curriculum and teaching materials for digital marketing
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Announcements -->
<section class="container my-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2>Announcements</h2>
            <p class="lead">Latest updates and news from the DigiMarkt project</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel announcement-carousel owl-theme">
                <div class="item">
                    <div class="card announcement-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Digital Marketing Training Workshop</h5>
                            <p class="card-text">A five-day training workshop on digital marketing for TVET teachers was successfully conducted at AAMUSTED, Kumasi.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">Posted on: June 15, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card announcement-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Digital Marketing Curriculum Launch</h5>
                            <p class="card-text">The new digital marketing curriculum for TVET institutions has been officially launched and is now available for download.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Download PDF</a>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">Posted on: May 22, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card announcement-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Digital Marketing Laboratory Inauguration</h5>
                            <p class="card-text">State-of-the-art digital marketing laboratories have been inaugurated at partner institutions in Ghana.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Photos</a>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">Posted on: April 10, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card announcement-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Project Coordination Meeting</h5>
                            <p class="card-text">Partners from Germany, Slovakia, and Ghana met to review project progress and plan future activities.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Meeting Minutes</a>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">Posted on: March 5, 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partner Institutions -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Partner Institutions</h2>
                <p class="lead">Collaboration across Europe and Africa</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 project-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Steinbeis Beratungszentrum (SRZ)</h5>
                        <p class="card-text text-muted">Germany</p>
                        <p class="card-text">Project Coordinator and lead partner providing expertise in project management and digital marketing.</p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <a href="https://www.steinbeis.de" target="_blank" class="btn btn-sm btn-outline-secondary">Visit Website</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 project-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Slovak University of Agriculture</h5>
                        <p class="card-text text-muted">Slovakia</p>
                        <p class="card-text">Contributing expertise in curriculum development and digital marketing education methodologies.</p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <a href="https://www.uniag.sk/en/" target="_blank" class="btn btn-sm btn-outline-secondary">Visit Website</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 project-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">AAMUSTED</h5>
                        <p class="card-text text-muted">Ghana</p>
                        <p class="card-text">Leading TVET institution in Ghana implementing digital marketing training and laboratory facilities.</p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <a href="https://aamusted.edu.gh" target="_blank" class="btn btn-sm btn-outline-secondary">Visit Website</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 project-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bolgatanga Technical University (BTU)</h5>
                        <p class="card-text text-muted">Ghana</p>
                        <p class="card-text">Partner institution implementing digital marketing curriculum and training programs in northern Ghana.</p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <a href="https://btu.edu.gh" target="_blank" class="btn btn-sm btn-outline-secondary">Visit Website</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 project-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cape Coast Technical University (CCTU)</h5>
                        <p class="card-text text-muted">Ghana</p>
                        <p class="card-text">Partner institution implementing digital marketing curriculum and training programs in central Ghana.</p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <a href="https://cctu.edu.gh" target="_blank" class="btn btn-sm btn-outline-secondary">Visit Website</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 project-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">European Union</h5>
                        <p class="card-text text-muted">Funding Partner</p>
                        <p class="card-text">Co-funding the project through the Erasmus+ Programme with a grant of €394,185.00.</p>
                    </div>
                    <div class="card-footer bg-transparent text-center">
                        <img src="{{ asset('assets/images/eu-logo-color.svg') }}" alt="EU Logo" class="img-fluid" style="max-height: 60px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EU Funding Information -->
<section class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('assets/images/eu-logo-color.svg') }}" alt="EU Logo" class="img-fluid mb-3 mb-md-0" style="max-height: 120px;">
                        </div>
                        <div class="col-md-9">
                            <h4>EU Funding Disclaimer</h4>
                            <p>This project has been funded with support from the European Commission. This publication reflects the views only of the author, and the Commission cannot be held responsible for any use which may be made of the information contained therein.</p>
                            <p class="mb-0"><strong>Project Reference:</strong> 609096-EPP-1-2019-1-DE-EPPKA2-CBHE-JP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Work Packages Modal -->
<div class="modal fade" id="workPackagesModal" tabindex="-1" aria-labelledby="workPackagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workPackagesModalLabel">Work Packages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <div class="list-group-item">
                        <h5 class="mb-1">WP1: Project Management and Implementation</h5>
                        <p class="mb-1">Coordination of all project activities, financial management, and quality assurance.</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">WP2: Needs Analysis and Curriculum Development</h5>
                        <p class="mb-1">Assessment of digital marketing skills needs and development of curriculum materials.</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">WP3: Digital Marketing Laboratory Setup</h5>
                        <p class="mb-1">Establishment of state-of-the-art digital marketing laboratories in partner institutions.</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">WP4: Teacher Training and Capacity Building</h5>
                        <p class="mb-1">Training of TVET teachers in digital marketing skills and pedagogical approaches.</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">WP5: Student Training and Pilot Implementation</h5>
                        <p class="mb-1">Pilot implementation of digital marketing courses for TVET students.</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">WP6: Dissemination and Exploitation</h5>
                        <p class="mb-1">Dissemination of project results and sustainability planning.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Partners Modal -->
<div class="modal fade" id="partnersModal" tabindex="-1" aria-labelledby="partnersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partnersModalLabel">Project Partners</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <div class="list-group-item">
                        <h5 class="mb-1">Steinbeis Beratungszentrum (SRZ), Germany</h5>
                        <p class="mb-1">Project Coordinator and lead partner providing expertise in project management and digital marketing.</p>
                        <a href="https://www.steinbeis.de" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Visit Website</a>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Slovak University of Agriculture, Slovakia</h5>
                        <p class="mb-1">Contributing expertise in curriculum development and digital marketing education methodologies.</p>
                        <a href="https://www.uniag.sk/en/" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Visit Website</a>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">AAMUSTED, Ghana</h5>
                        <p class="mb-1">Leading TVET institution in Ghana implementing digital marketing training and laboratory facilities.</p>
                        <a href="https://aamusted.edu.gh" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Visit Website</a>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Bolgatanga Technical University (BTU), Ghana</h5>
                        <p class="mb-1">Partner institution implementing digital marketing curriculum and training programs in northern Ghana.</p>
                        <a href="https://btu.edu.gh" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Visit Website</a>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Cape Coast Technical University (CCTU), Ghana</h5>
                        <p class="mb-1">Partner institution implementing digital marketing curriculum and training programs in central Ghana.</p>
                        <a href="https://cctu.edu.gh" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Visit Website</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (required for Owl Carousel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    $(document).ready(function(){
        // Initialize Owl Carousel for announcements
        $(".announcement-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
        
        // Initialize Lightbox
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    });
</script>
@endsection
