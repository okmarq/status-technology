<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Status Technology</title>

    <style>
        .small-image {
            width: 60px;
            height: 60px;
        }

        .sm-text-6 {
            font-size: .6rem;
        }
    </style>
</head>

<body class="container">
    <h1>status Technology</h1>

    <form action="" method="post" id="form">
        <div>
            <label for="restaurantName">Restaurant name</label>
            <input type="text" name="restaurantName" id="restaurantName" required>
        </div>

        <div>
            <label for="restaurantMeal">Restaurant meal</label>
            <input type="text" name="restaurantMeal" id="restaurantMeal" required>
        </div>

        <button type="submit" class="btn btn-sm btn-outline-success">Add status</button>
    </form>

    <div id="response"></div>

    <div id="allStatus"></div>

    <button id="viewStatus" type="button" class="btn btn-sm btn-outline-primary">View status</button>

    <div id="traverse"></div>

    <div id="statusView"></div>

    <div id="status"></div>

    <!-- <section class="">
        <div class="">
            <div class="d-flex flex-column d-grid gap-5 m-5">
                <div class="card shadow-sm rounded-3" style="width: 30rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-3">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small-image border rounded-3 flex-shrink-0"></div>

                                    <div class="flex-grow-1 ms-2">
                                        <div class="fw-bold fs-5 lh-sm">Papa Murphy's Pizza - Papa Murphy's Pizza</div>
                                        <div class="text-black-50">Al Safa Complex, Al Safa, Dubai</div>
                                    </div>
                                </div>

                                <div class="fw-bold fs-5 ms-2">AED32.00</div>
                            </div>
                        </li>

                        <li class="list-group-item py-3">
                            <div class="mb-2">
                                <span class="badge rounded bg-opacity-25 bg-success text-success fs-6 fw-light">Delivered</span>
                            </div>

                            <div class="mb-2">
                                <div class="text-black-50">ITEMS</div>
                                <div class="fw-bold">1 x Half N Half Medium Original</div>
                            </div>

                            <div class="mb-2">
                                <div class="text-black-50">ORDERED ON</div>
                                <div class="fw-bold">18 Oct 2021 at 7:59 PM</div>
                            </div>
                        </li>

                        <li class="list-group-item bg-light py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="text-danger fs-5 mb-1">Rate order</div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">1 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">2 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">3 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">4 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">5 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                    </div>
                                </div>

                                <button class="d-flex align-items-center btn">
                                    <i class="fa fa-history"></i>
                                    <span class="ms-1">Repeat Order</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="card shadow-sm rounded-3" style="min-width: 26rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-3">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small-image border rounded-3 flex-shrink-0"></div>

                                    <div class="flex-grow-1 ms-2">
                                        <div class="fw-bold fs-5 lh-sm">Papa Murphy's Pizza - Papa Murphy's Pizza</div>
                                        <div class="text-black-50">Al Safa Complex, Al Safa, Dubai</div>
                                    </div>
                                </div>

                                <div class="fw-bold fs-5 ms-2">AED32.00</div>
                            </div>
                        </li>

                        <li class="list-group-item py-3">
                            <div class="mb-2">
                                <span class="badge rounded bg-opacity-25 bg-success text-success fs-6 fw-light">Delivered</span>
                            </div>

                            <div class="mb-2">
                                <div class="text-black-50">ITEMS</div>
                                <div class="fw-bold">1 x Half N Half Medium Original</div>
                            </div>

                            <div class="mb-2">
                                <div class="text-black-50">ORDERED ON</div>
                                <div class="fw-bold">18 Oct 2021 at 7:59 PM</div>
                            </div>
                        </li>

                        <li class="list-group-item bg-light py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="text-danger fs-5 mb-1">Rate order</div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">1 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">2 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">3 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">4 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 py-0 fs-6">5 <i class="fa fa-star sm-text-6"></i>
                                        </button>
                                    </div>
                                </div>

                                <button class="d-flex align-items-center btn">
                                    <i class="fa fa-history"></i>
                                    <span class="ms-1">Repeat Order</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="./disappear.js"></script>
    <script src="./save-restaurant.js"></script>
</body>

</html>