<div class="row g-4">
   
    @forelse($products as $product)
        <div class="col-md-4">
            <div class="bg-white p-3 text-center h-100 d-flex flex-column justify-content-between product_card">
                <div>
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="mb-3 d-flex align-items-center justify-content-center" style="height: 200px; overflow: hidden;">
                            <img src="{{ url('/' . $product->image) }}" class="img-fluid h-100" style="object-fit: cover;" alt="{{ $product->name }}">
                        </div>
                        <h6>{{ $product->name }}</h6>
                    </a>
                    <p class="text-muted small mb-2 text-truncate" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <p class="price-txt mb-0">${{ number_format($product->price, 2) }}</p>
                    <button class="btn btn-primary px-4 add-to-cart"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-img="{{ $product->image }}">
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">No products found.</p>
    @endforelse
</div>
