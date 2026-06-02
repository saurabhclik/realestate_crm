<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $property->property_name ?? 'Property Details' }}</title>
    <meta property="og:title" content="{{ $property->property_name ?? 'Property Details' }}">
    <meta property="og:description" content="{{ trim(($property->property_type ?? '').' '.($property->city ?? '').' '.($property->state ?? '')) ?: 'View property details and photos' }}">
    <meta property="og:url" content="{{ $property->share_url }}">
    <meta property="og:type" content="website">
    @if(!empty($property->first_image_url))
    <meta property="og:image" content="{{ $property->first_image_url }}">
    <meta property="og:image:secure_url" content="{{ $property->first_image_url }}">
    <meta property="og:image:alt" content="{{ $property->property_name ?? 'Property image' }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $property->first_image_url }}">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fb;
            color: #1f2937;
        }
        .property-hero {
            background: #111827;
            color: #fff;
            padding: 32px 0;
        }
        .property-shell {
            max-width: 1120px;
            margin: 0 auto;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
        }
        .gallery-grid img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
            background: #e5e7eb;
        }
        .info-box {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            height: 100%;
        }
        .label {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 2px;
        }
        .value {
            font-weight: 600;
            word-break: break-word;
        }
    </style>
</head>
<body>
    <header class="property-hero">
        <div class="property-shell px-3">
            <h1 class="h3 mb-2">{{ $property->property_name ?? 'Property Details' }}</h1>
            <div class="text-white-50">
                {{ $property->city ?? '' }}{{ !empty($property->state) ? ', '.$property->state : '' }}
            </div>
        </div>
    </header>

    <main class="property-shell px-3 py-4">
        @if(!empty($property->image_urls))
            <section class="mb-4">
                <div class="gallery-grid">
                    @foreach($property->image_urls as $imageUrl)
                        <a href="{{ $imageUrl }}" target="_blank" rel="noopener">
                            <img src="{{ $imageUrl }}" alt="{{ $property->property_name ?? 'Property image' }}">
                        </a>
                    @endforeach
                </div>
            </section>
        @else
            <div class="alert alert-info">No property images available.</div>
        @endif

        <section class="row g-3">
            <div class="col-md-4">
                <div class="info-box">
                    <div class="label">Type</div>
                    <div class="value">{{ $property->property_type ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="label">Category</div>
                    <div class="value">{{ $property->property_category ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="label">Sub Category</div>
                    <div class="value">{{ $property->property_sub_category ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="label">Budget</div>
                    <div class="value">{{ $property->budget_price ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="label">Status</div>
                    <div class="value">{{ $property->property_status ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="label">Size</div>
                    <div class="value">{{ $property->property_size ?? '-' }}</div>
                </div>
            </div>
            @if(!empty($property->address))
                <div class="col-12">
                    <div class="info-box">
                        <div class="label">Address</div>
                        <div class="value">{{ $property->address }}</div>
                    </div>
                </div>
            @endif
        </section>
    </main>
</body>
</html>
