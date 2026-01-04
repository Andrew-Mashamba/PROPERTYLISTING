@props(['property'])
@php
  $formatPrice = fn($price) => 'TZS ' . number_format($price, 0, '.', ',');
  $formatSqft = fn($sqft) => number_format($sqft ?? 0);
  $firstImage = $property->images->first();
  $imageUrl = $firstImage ? \Illuminate\Support\Facades\Storage::url($firstImage->image_path) : asset('images/placeholder.jpg');
@endphp

<a href="/property/{{ $property->id }}" class="group block bg-card rounded-lg overflow-hidden shadow-card hover:shadow-lg transition-all duration-300">
  <div class="relative aspect-[4/3] overflow-hidden">
    <img src="{{ $imageUrl }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    <div class="absolute top-3 left-3 flex gap-2">
      @if($property->is_featured)
        <span class="bg-primary text-primary-foreground text-xs font-semibold px-2.5 py-1 rounded-md">FEATURED</span>
      @endif
      <span class="bg-background/90 backdrop-blur-sm text-foreground text-xs font-medium px-2.5 py-1 rounded-md">{{ $property->property_type }}</span>
    </div>
    <button type="button" class="absolute top-3 right-3 w-9 h-9 flex items-center justify-center bg-background/90 backdrop-blur-sm rounded-full hover:bg-background transition-colors z-20" onclick="event.preventDefault(); event.stopPropagation();">
      <i class="lucide lucide-heart w-5 h-5 text-foreground"></i>
    </button>
  </div>

  <div class="p-4">
    <p class="text-2xl font-bold text-price mb-2">{{ $formatPrice($property->price) }}</p>
    <div class="flex items-center gap-4 text-muted-foreground text-sm mb-3">
      @if($property->bedrooms)
        <span class="flex items-center gap-1.5">
          <i class="lucide lucide-bed-double w-4 h-4"></i>{{ $property->bedrooms }} bd
        </span>
      @endif
      @if($property->bathrooms)
        <span class="flex items-center gap-1.5">
          <i class="lucide lucide-bath w-4 h-4"></i>{{ $property->bathrooms }} ba
        </span>
      @endif
      @if($property->sqft)
        <span class="flex items-center gap-1.5">
          <i class="lucide lucide-square w-4 h-4"></i>{{ $formatSqft($property->sqft) }} sqft
        </span>
      @endif
    </div>
    <p class="text-foreground font-medium truncate">{{ $property->address }}</p>
    <p class="text-muted-foreground text-sm">{{ $property->city }}{{ $property->state ? ', ' . $property->state : '' }}</p>
  </div>
</a>

