@extends('layouts.app')
@section('title', 'Gourmet Grub - Home')
@section('body')

    <style>
        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .new-badge {
            background-color: #ff4757;
            color: white;
            font-size: 12px;
            font-weight: 600;
            border-radius: 20px;
            padding: 4px 10px;
            display: inline-block;
            margin-bottom: 8px;
        }

        h2.section-title {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: left;
            margin-bottom: 1.5rem;
        }
    </style>

    <!-- 🟡 Burger Section -->
    <section class="container my-5">
        <h2 id="burger" class="section-title">🍔 Burgers</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://source.unsplash.com/400x300/?burger" alt="Burger" class="rounded-4"
                                style="width:120px; height:120px; object-fit:cover;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fw-bold fs-5 mb-1">App Ka Burger (Kebab Dose)</h6>
                            <p class="text-muted small mb-2">Enjoy the taste of our signature Kebab Dose Burger...</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold bg-dark text-white px-2 py-1 rounded small">Rs. 599.00</span>
                            </div>
                            <button class="btn btn-warning w-100 fw-bold rounded-pill py-1">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🟡 Shawarma Section -->
    <section class="container my-5">
        <h2 id="shawarma" class="section-title">🌯 Shawarma</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://source.unsplash.com/400x300/?shawarma" alt="Shawarma" class="rounded-4"
                                style="width:120px; height:120px; object-fit:cover;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fw-bold fs-5 mb-1">Classic Shawarma</h6>
                            <p class="text-muted small mb-2">Tender chicken with creamy garlic sauce.</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold bg-dark text-white px-2 py-1 rounded small">Rs. 400.00</span>
                            </div>
                            <button class="btn btn-warning w-100 fw-bold rounded-pill py-1">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🟡 Pizza Section -->
    <section class="container my-5">
        <h2 id="pizza" class="section-title">🍕 Pizza</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://source.unsplash.com/400x300/?pizza" alt="Pizza" class="rounded-4"
                                style="width:120px; height:120px; object-fit:cover;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fw-bold fs-5 mb-1">Cheese Pizza</h6>
                            <p class="text-muted small mb-2">Mozzarella & tomato sauce on crispy crust.</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold bg-dark text-white px-2 py-1 rounded small">Rs. 1200.00</span>
                            </div>
                            <button class="btn btn-warning w-100 fw-bold rounded-pill py-1">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🟡 Pasta Section -->
    <section class="container my-5">
        <h2 id="pasta" class="section-title">🍝 Pasta</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://source.unsplash.com/400x300/?pasta" alt="Pasta" class="rounded-4"
                                style="width:120px; height:120px; object-fit:cover;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fw-bold fs-5 mb-1">Alfredo Pasta</h6>
                            <p class="text-muted small mb-2">Creamy white sauce pasta with parmesan.</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold bg-dark text-white px-2 py-1 rounded small">Rs. 800.00</span>
                            </div>
                            <button class="btn btn-warning w-100 fw-bold rounded-pill py-1">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🟡 Wrap Section -->
    <section class="container my-5">
        <h2 id="wrap" class="section-title">🌮 Wraps</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://source.unsplash.com/400x300/?wrap" alt="Wrap" class="rounded-4"
                                style="width:120px; height:120px; object-fit:cover;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fw-bold fs-5 mb-1">Grilled Chicken Wrap</h6>
                            <p class="text-muted small mb-2">Soft tortilla with grilled chicken & veggies.</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold bg-dark text-white px-2 py-1 rounded small">Rs. 450.00</span>
                            </div>
                            <button class="btn btn-warning w-100 fw-bold rounded-pill py-1">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
