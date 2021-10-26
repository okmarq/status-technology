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

    <?php
    spl_autoload_register(function ($class_name) {
        require_once 'functions/' . $class_name . '.php';
    });

    $database = new Database();
    $db = $database->getConnection();
    $restaurant = new Restaurant($db);
    ?>
</head>

<body class="container">
    <form id="restaurant-form" class="row my-3" method="post">
        <div class="input-group">
            <input id="restaurant" type="text" class="form-control form-control-sm" placeholder="Restaurant's name" aria-label="Restaurant's name" aria-describedby="save-restaurant" required>

            <button class="btn btn-outline-success" type="submit">Save</button>
        </div>

        <div id="restaurant-response" class="small"></div>
    </form>

    <form id="status-form" class="row my-5" method="post">
        <div class="input-group">
            <input id="status" type="text" class="form-control form-control-sm" placeholder="Status" aria-label="Status" aria-describedby="save-status" required>

            <select id="restaurant-id" class="form-select form-select-sm" aria-label="Select your restaurant from the list">
                <option selected>Choose...</option>

                <?php
                $stmt = $restaurant->readAll();
                $num = $stmt->rowCount();

                if ($num > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);

                        echo "<option value='{$id}'>{$name}</option>";
                    }
                } else {
                    echo "<option>No restaurant found</option>";
                }
                ?>
            </select>

            <button class="btn btn-outline-primary" type="submit">Save</button>

        </div>

        <div id="status-response" class="small"></div>
    </form>

    <div class="d-flex flex-wrap">
        <div class="flex-fill row justify-content-center my-5">
            <div class="col-12 col-lg-6">
                <div class="bg-white shadow-sm border rounded">
                    <div class="d-flex justify-content-between align-items-center px-2 py-3 border-bottom bg-light">
                        <div class="small-image border rounded-3 me-2"></div>
                        <div class="flex-fill" style="line-height:1;">
                            <small><b>Papa Murphy's Pizza - بيتزا بابا مورفي</b></small><br>
                            <small class="text-muted" style="font-size:12px;">Papa Murphy's Pizza - بيتزا بابا مورفي</small>
                        </div>
                        <div class="ms-2"><small style="font-size:13px;"><b>AED 32</b></small></div>
                    </div>

                    <div class="d-flex flex-column px-2 py-2 border-bottom">
                        <div class="mb-2">
                            <span class="badge rounded bg-opacity-25 bg-success text-success" style="font-weight:500;">Delivered</span>
                        </div>

                        <div class="">
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column px-2 py-3 border-bottom">
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                            <div class="mb-2" style="line-height:1;">
                                <small class="text-muted" style="font-size:12px;">ITEMS</small><br>
                                <small style="font-size:13px;font-weight:500;">1 x Half N Half Medium Original</small>
                            </div>

                            <div class="progress" style="height: 5px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        <?php } ?>

                        <div class="mt-1" style="line-height:1;">
                            <small class="text-muted" style="font-size:12px;">ORDERED ON</small><br>
                            <small style="font-size:13px;font-weight:500;">18 Oct 2021 at 7:59 PM</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center px-2 py-2 bg-light">
                        <div class="">
                            <span class="badge bg-light text-dark border me-1">1 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border me-1">2 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border me-1">3 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border me-1">4 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border">5 <i class="fa fa-star"></i></span>
                        </div>

                        <div class="" style="line-height:1;">
                            <small>
                                <i class="fa fa-history"></i>
                                <span class="ms-1" style="font-size:12px;">Repeat Order</span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-fill row justify-content-center my-5">
            <div class="col-12 col-lg-6">
                <div class="bg-white shadow-sm border rounded">
                    <div class="d-flex justify-content-between align-items-center px-2 py-3 border-bottom bg-light">
                        <div class="small-image border rounded-3 me-2"></div>
                        <div class="flex-fill" style="line-height:1;">
                            <small><b>Papa Murphy's Pizza - بيتزا بابا مورفي</b></small><br>
                            <small class="text-muted" style="font-size:12px;">Papa Murphy's Pizza - بيتزا بابا مورفي</small>
                        </div>
                        <div class="ms-2"><small style="font-size:13px;"><b>AED 32</b></small></div>
                    </div>

                    <div class="d-flex flex-column px-2 py-2 border-bottom">
                        <div class="mb-2">
                            <span class="badge rounded bg-opacity-25 bg-success text-success" style="font-weight:500;">Delivered</span>
                        </div>

                        <div class="">
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column px-2 py-3 border-bottom">
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                        ?>
                            <div class="mb-2" style="line-height:1;">
                                <small class="text-muted" style="font-size:12px;">ITEMS</small><br>
                                <small style="font-size:13px;font-weight:500;">1 x Half N Half Medium Original</small>
                            </div>

                            <div class="progress" style="height: 5px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        <?php } ?>

                        <div class="mt-1" style="line-height:1;">
                            <small class="text-muted" style="font-size:12px;">ORDERED ON</small><br>
                            <small style="font-size:13px;font-weight:500;">18 Oct 2021 at 7:59 PM</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center px-2 py-2 bg-light">
                        <div class="">
                            <span class="badge bg-light text-dark border me-1">1 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border me-1">2 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border me-1">3 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border me-1">4 <i class="fa fa-star"></i></span>
                            <span class="badge bg-light text-dark border">5 <i class="fa fa-star"></i></span>
                        </div>

                        <div class="" style="line-height:1;">
                            <small>
                                <i class="fa fa-history"></i>
                                <span class="ms-1" style="font-size:12px;">Repeat Order</span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="./js/disappear.js"></script>
    <script src="./js/save-restaurant.js"></script>
    <script src="./js/save-status.js"></script>
</body>

</html>