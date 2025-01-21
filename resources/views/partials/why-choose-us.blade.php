@php
    $allFeatures = App\Models\Feature::where('active', true)
        ->orderBy('order')
        ->get();
    $features = $allFeatures->chunk(ceil($allFeatures->count() / 2));
@endphp


<section class="why-choose-us py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Why Choose Us?</h2>
            <p class="lead">The Brightbell Janitors Advantage</p>
        </div>

        <div class="row g-4">
            @foreach($features as $columnFeatures)
                <div class="col-lg-6">
                    @foreach($columnFeatures as $feature)
                        <div class="feature-item d-flex mb-4">
                            <div class="feature-icon me-3">
                                <i class="{{ $feature->icon }} fa-2x text-primary"></i>
                            </div>
                            <div class="feature-content">
                                <h4>{{ $feature->title }}</h4>
                                <p>{{ $feature->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
