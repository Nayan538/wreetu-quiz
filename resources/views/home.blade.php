@extends('layout.app')
@section('title',"Home")
@section('description',"Dashboard")
@section('content')
<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Dashboard</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
              <!-- Card 1  -->
              <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">

                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                  <div class="ap-po-details__titlebar">
                    <p>Total Products</p>
                    <h1 id="total-products">0</h1>
                    <div class="ap-po-details-time">
                      <span class="color-success" id="sales-block">
                        <i id="icon" class="las la-arrow-up"></i>
                        <strong id="current-month-products">0</strong>
                      </span>
                      <small>Since last month</small>
                    </div>
                  </div>                  
                  <div class="ap-po-details__icon-area color-primary">
                    <i class="uil uil-arrow-growth"></i>
                  </div>
                </div>

              </div>
              <!-- Card 1 End  -->
            </div>

            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
              <!-- Card 2 -->
              <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">





                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                  <div class="ap-po-details__titlebar">
                    <p>Total Orders</p>
                    <h1 id="total-orders">0</h1>
                    <div class="ap-po-details-time">
                      <span class="color-success" id="Ordergrowth-block">
                        <i id="icon" class="las la-arrow-up"></i>
                        <strong id="current-month-total-orders">0</strong></span>
                      <small>Since last month</small>
                    </div>
                  </div>
                  <div class="ap-po-details__icon-area color-secondary">
                    <i class="uil uil-users-alt"></i>
                  </div>
                </div>

              </div>
              <!-- Card 2 End  -->
            </div>

            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
              <!-- Card 3 -->
              <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">





                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                  <div class="ap-po-details__titlebar">
                    <p>Total Sales</p>
                    <h1 id="total-sales">0</h1>
                    <div class="ap-po-details-time">
                      <span class="color-success" id="salesTotal-block">
                        <i id="icon" class="las la-arrow-up"></i>
                        <strong id="current-month-total-sales">0</strong></span>
                      <small>Since last month</small>
                    </div>
                  </div>
                  <div class="ap-po-details__icon-area color-success">
                    <i class="uil uil-usd-circle"></i>
                  </div>
                </div>

              </div>
              <!-- Card 3 End  -->
            </div>

            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
              <!-- Card 4  -->
              <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">





                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                  <div class="ap-po-details__titlebar">
                    <p>New Customers</p>
                    <h1 id="total-customers">0</h1>
                    <div class="ap-po-details-time">
                      <span class="color-success" id="customerTotal-block">
                        <i id="icon" class="las la-arrow-up"></i>
                        <strong id="current-month-customer">0</strong></span>
                      <small>Since last month</small>
                    </div>
                  </div>
                  <div class="ap-po-details__icon-area color-info">
                    <i class="uil uil-tachometer-fast"></i>
                  </div>
                </div>

              </div>
              <!-- Card 4 End  -->
            </div>            <div class="col-xxl-6 mb-25">

              <div class="card revenueChartTwo border-0">
                <div class="card-header border-0">
                  <h6>Sales Revenue</h6>
                  <div class="card-extra">
                    <ul class="card-tab-links nav-tabs nav" role="tablist">
                      <li>
                        <a class="active" href="#tl_revenue-today" data-bs-toggle="tab" id="tl_revenue-today-tab" role="tab" aria-selected="false">Today</a>
                      </li>
                      <li>
                        <a href="#tl_revenue-week" data-bs-toggle="tab" id="tl_revenue-week-tab" role="tab" aria-selected="false">Week</a>
                      </li>
                      <li>
                        <a href="#tl_revenue-month" data-bs-toggle="tab" id="tl_revenue-month-tab" role="tab" aria-selected="false">Month</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- ends: .card-header -->
                <div class="card-body pt-0 pb-40">
                  <div class="tab-content">
                    <div class="tab-pane fade active show" id="tl_revenue-today" role="tabpanel" aria-labelledby="tl_revenue-today-tab">
                      <div class="cashflow-display cashflow-display2 d-flex">

                      </div>
                      <!-- ends: .performance-stats -->

                      <div class="wp-chart">
                        <div class="parentContainer">


                          <div>
                            <canvas id="saleRevenueToday"></canvas>
                          </div>


                        </div>
                      </div>

                      <!-- ends: .performance-stats -->
                    </div>
                    <div class="tab-pane fade" id="tl_revenue-week" role="tabpanel" aria-labelledby="tl_revenue-week-tab">
                      <div class="cashflow-display cashflow-display2 d-flex">

                      </div>
                      <!-- ends: .performance-stats -->

                      <div class="wp-chart">
                        <div class="parentContainer">


                          <div>
                            <canvas id="saleRevenueWeek"></canvas>
                          </div>


                        </div>
                      </div>

                      <!-- ends: .performance-stats -->
                    </div>
                    <div class="tab-pane fade" id="tl_revenue-month" role="tabpanel" aria-labelledby="tl_revenue-month-tab">
                      <div class="cashflow-display cashflow-display2 d-flex">

                      </div>
                      <!-- ends: .performance-stats -->

                      <div class="wp-chart">
                        <div class="parentContainer">


                          <div>
                            <canvas id="saleRevenueMonth"></canvas>
                          </div>


                        </div>
                      </div>

                      <!-- ends: .performance-stats -->
                    </div>
                  </div>
                </div>
                <!-- ends: .card-body -->
              </div>

            </div>            <div class="col-xxl-6 mb-25">

    <div class="card border-0 px-25 h-100">
      <div class="card-header px-0 border-0">
        <h6>Source Of Revenue Generated</h6>
        <div class="dropdown dropleft">
          <a href="#" role="button" id="todo12" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="http://45.33.34.15:8002/assets/img/svg/more-horizontal.svg" alt="more-horizontal" class="svg">
          </a>
          <div class="dropdown-menu" aria-labelledby="todo12">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <div class="p-0 card-body">
        <div class="revenueSourceChart px-0">
          <div class="parentContainer position-relative">

            <div class="apexpie ms-md-n50">
              <div class="apexPieToday"></div>
            </div>

          </div>
          <div class="chart-content__details">
            <div class="chart-content__single">
              <span class="icon color-facebook">
                <span class="uil uil-facebook-f"></span>
              </span>
              <span class="label">Facebook</span>
              <span class="data">$4621</span>
            </div>
            <div class="chart-content__single">
              <span class="icon color-twitter">
                <span class="uil uil uil-twitter"></span>
              </span>
              <span class="label">twitter</span>
              <span class="data">$3621</span>
            </div>
            <div class="chart-content__single">
              <span class="icon color-secondary">
                <span class="uil uil uil-google"></span>
              </span>
              <span class="label">google</span>
              <span class="data">$8945</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>            <div class="col-xxl-4 mb-25">

    <div class="card border-0 px-25">
      <div class="card-header px-0 border-0">
        <h6>New Product</h6>
        <div class="card-extra">
          <ul class="card-tab-links nav-tabs nav" role="tablist">
            <li>
              <a class="active" href="#t_selling-today" data-bs-toggle="tab" id="t_selling-today-tab" role="tab" aria-selected="true">Today</a>
            </li>
            <li>
              <a href="#t_selling-week" data-bs-toggle="tab" id="t_selling-week-tab" role="tab" aria-selected="true">Week</a>
            </li>
            <li>
              <a href="#t_selling-month" data-bs-toggle="tab" id="t_selling-month-tab" role="tab" aria-selected="true">Month</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="tab-content">
          <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel" aria-labelledby="t_selling-today-tab">
            <div class="selling-table-wrap">
              <div class="table-responsive">
                <table class="table table--default table-borderless ">
                  <thead>
                    <tr>
                      <th>PRDUCTS NAME</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="radius-xs img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/giorgio.png" alt="img">
                          <span>UV Protected Sunglass</span>
                        </div>
                      </td>
                      <td>$38,536</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="radius-xs img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/headphone.png" alt="img">
                          <span>Black Headphone</span>
                        </div>
                      </td>
                      <td>$20,573</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="radius-xs img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/shoes.png" alt="img">
                          <span>Nike Shoes</span>
                        </div>
                      </td>
                      <td>$17,457</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="radius-xs img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/mac-pro.png" alt="img">
                          <span>15" Mackbook Pro</span>
                        </div>
                      </td>
                      <td>$15,354</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="radius-xs img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/creativ-bag.png" alt="img">
                          <span>Women Bag</span>
                        </div>
                      </td>
                      <td>$12,354</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="t_selling-week" role="tabpanel" aria-labelledby="t_selling-week-tab">
            <div class="selling-table-wrap">
              <div class="table-responsive">
                <table class="table table--default table-borderless">
                  <thead>
                    <tr>
                      <th>PRDUCTS NAME</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/287.png" alt="img">
                          <span>Samsung Galaxy S8 256GB</span>
                        </div>
                      </td>
                      <td>$60,258</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid" src="http://45.33.34.15:8002/assets/img/165.png" alt="img">
                          <span>Half Sleeve Shirt</span>
                        </div>
                      </td>
                      <td>$2,483</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/166.png" alt="img">
                          <span>Marco Shoes</span>
                        </div>
                      </td>
                      <td>$19,758</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/315.png" alt="img">
                          <span>15" Mackbook Pro</span>
                        </div>
                      </td>
                      <td>$197,458</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/506.png" alt="img">
                          <span>Apple iPhone X</span>
                        </div>
                      </td>
                      <td>115,254</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="t_selling-month" role="tabpanel" aria-labelledby="t_selling-month-tab">
            <div class="selling-table-wrap">
              <div class="table-responsive">
                <table class="table table--default table-borderless">
                  <thead>
                    <tr>
                      <th>PRDUCTS NAME</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/287.png" alt="img">
                          <span>Samsung Galaxy S8 256GB</span>
                        </div>
                      </td>
                      <td>$60,258</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid" src="http://45.33.34.15:8002/assets/img/165.png" alt="img">
                          <span>Half Sleeve Shirt</span>
                        </div>
                      </td>
                      <td>$2,483</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/166.png" alt="img">
                          <span>Marco Shoes</span>
                        </div>
                      </td>
                      <td>$19,758</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/315.png" alt="img">
                          <span>15" Mackbook Pro</span>
                        </div>
                      </td>
                      <td>$197,458</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="selling-product-img d-flex align-items-center">
                          <img class="me-15 wh-34 img-fluid order-bg-opacity-primary" src="http://45.33.34.15:8002/assets/img/506.png" alt="img">
                          <span>Apple iPhone X</span>
                        </div>
                      </td>
                      <td>115,254</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>            <div class="col-xxl-8 mb-25">

  <div class="card border-0 px-25">
    <div class="card-header px-0 border-0">
      <h6>Best Seller</h6>
      <div class="card-extra">
        <ul class="card-tab-links nav-tabs nav" role="tablist">
          <li>
            <a class="active" href="#t_selling-today222" data-bs-toggle="tab" id="t_selling-today222-tab" role="tab" aria-selected="true">Today</a>
          </li>
          <li>
            <a href="#t_selling-week222" data-bs-toggle="tab" id="t_selling-week222-tab" role="tab" aria-selected="true">Week</a>
          </li>
          <li>
            <a href="#t_selling-month333" data-bs-toggle="tab" id="t_selling-month333-tab" role="tab" aria-selected="true">Month</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="tab-content">
        <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
          <div class="selling-table-wrap selling-table-wrap--source">
            <div class="table-responsive">
              <table class="table table--default table-borderless">
                <thead>
                  <tr>
                    <th>Seller name</th>
                    <th>Company</th>
                    <th>Product</th>
                    <th>Revenue</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-1.png" alt="img">
                        </div>
                        <span>Robert Clinton</span>
                      </div>
                    </td>
                    <td>Samsung</td>
                    <td>Smart Phone</td>
                    <td>
                      $38,536
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-2.png" alt="img">
                        </div>
                        <span>Michael Johnson </span>
                      </div>
                    </td>
                    <td>Asus</td>
                    <td>Laptop</td>
                    <td>
                      $20,573
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-secondary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-3.png" alt="img">
                        </div>
                        <span>Daniel White</span>
                      </div>
                    </td>
                    <td>Google</td>
                    <td>Watch</td>
                    <td>
                      $17,457
                    </td>
                    <td>Pending</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-success align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-4.png" alt="img">
                        </div>
                        <span>Chris Barin </span>
                      </div>
                    </td>
                    <td>Apple</td>
                    <td>Computer</td>
                    <td>
                      $15,354
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-info align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-5.png" alt="img">
                        </div>
                        <span>Daniel Pink</span>
                      </div>
                    </td>
                    <td>Panasonic</td>
                    <td>Sunglass</td>
                    <td>
                      $12,354
                    </td>
                    <td>Done</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="t_selling-week222" role="tabpanel" aria-labelledby="t_selling-week222-tab">
          <div class="selling-table-wrap selling-table-wrap--source">
            <div class="table-responsive">
              <table class="table table--default table-borderless">
                <thead>
                  <tr>
                    <th>Seller name</th>
                    <th>Company</th>
                    <th>Product</th>
                    <th>Revenue</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-1.png" alt="img">
                        </div>
                        <span>Robert Clinton</span>
                      </div>
                    </td>
                    <td>Samsung</td>
                    <td>Smart Phone</td>
                    <td>
                      $38,536
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-2.png" alt="img">
                        </div>
                        <span>Michael Johnson </span>
                      </div>
                    </td>
                    <td>Asus</td>
                    <td>Laptop</td>
                    <td>
                      $20,573
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-secondary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-3.png" alt="img">
                        </div>
                        <span>Daniel White</span>
                      </div>
                    </td>
                    <td>Google</td>
                    <td>Watch</td>
                    <td>
                      $17,457
                    </td>
                    <td>Pending</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-success align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-4.png" alt="img">
                        </div>
                        <span>Chris Barin </span>
                      </div>
                    </td>
                    <td>Apple</td>
                    <td>Computer</td>
                    <td>
                      $15,354
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-info align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-5.png" alt="img">
                        </div>
                        <span>Daniel Pink</span>
                      </div>
                    </td>
                    <td>Panasonic</td>
                    <td>Sunglass</td>
                    <td>
                      $12,354
                    </td>
                    <td>Done</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="t_selling-month333" role="tabpanel" aria-labelledby="t_selling-month333-tab">
          <div class="selling-table-wrap selling-table-wrap--source">
            <div class="table-responsive">
              <table class="table table--default table-borderless">
                <thead>
                  <tr>
                    <th>Seller name</th>
                    <th>Company</th>
                    <th>Product</th>
                    <th>Revenue</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-1.png" alt="img">
                        </div>
                        <span>Robert Clinton</span>
                      </div>
                    </td>
                    <td>Samsung</td>
                    <td>Smart Phone</td>
                    <td>
                      $38,536
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-primary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-2.png" alt="img">
                        </div>
                        <span>Michael Johnson </span>
                      </div>
                    </td>
                    <td>Asus</td>
                    <td>Laptop</td>
                    <td>
                      $20,573
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-secondary align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-3.png" alt="img">
                        </div>
                        <span>Daniel White</span>
                      </div>
                    </td>
                    <td>Google</td>
                    <td>Watch</td>
                    <td>
                      $17,457
                    </td>
                    <td>Pending</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-success align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-4.png" alt="img">
                        </div>
                        <span>Chris Barin </span>
                      </div>
                    </td>
                    <td>Apple</td>
                    <td>Computer</td>
                    <td>
                      $15,354
                    </td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="selling-product-img d-flex align-items-center">
                        <div class="selling-product-img-wrapper order-bg-opacity-info align-items-end">
                          <img class=" img-fluid" src="http://45.33.34.15:8002/assets/img/author/robert-5.png" alt="img">
                        </div>
                        <span>Daniel Pink</span>
                      </div>
                    </td>
                    <td>Panasonic</td>
                    <td>Sunglass</td>
                    <td>
                      $12,354
                    </td>
                    <td>Done</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>            
        </div>
    </div>
</div>
        </div>
        <footer class="footer-wrapper">
            <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="footer-copyright">
                <p>©  2024<a href="#">Sovware</a></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="footer-menu text-end">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
        <div class="customizer">
    <div class="customizer__head">
        <h4 class="customizer__title">Customizer</h4>
        <span class="customizer__sub-title">Customize your overview page layout</span>
        <a href="#" class="customizer-close">
            <img class="svg" src="http://45.33.34.15:8002/assets/img/svg/close.svg" alt="">
        </a>
    </div>
    <div class="customizer__body">
        <div class="customizer__single">
            <h4>Layout Type</h4>
            <ul class="customizer-list d-flex layout">
                <li class="customizer-list__item">
                    <a href="http://45.33.34.15:8002/lang/en" class="active">
                        <img src="http://45.33.34.15:8002/assets/img/ltr.png" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item">
                    <a href="http://45.33.34.15:8002/lang/ar" class="">
                        <img src="http://45.33.34.15:8002/assets/img/rtl.png" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="customizer__single">
            <h4>Sidebar Type</h4>
            <ul class="customizer-list d-flex l_sidebar">
                <li class="customizer-list__item">
                    <a href="#" data-layout="light" class="dark-mode-toggle active">
                        <img src="http://45.33.34.15:8002/assets/img/light.png" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item">
                    <a href="#" data-layout="dark" class="dark-mode-toggle">
                        <img src="http://45.33.34.15:8002/assets/img/dark.png" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="customizer__single">
            <h4>Navbar Type</h4>
            <ul class="customizer-list d-flex l_navbar">
                <li class="customizer-list__item">
                    <a href="#" data-layout="side" class="active">
                        <img src="http://45.33.34.15:8002/assets/img/side.png" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item top">
                    <a href="#" data-layout="top">
                        <img src="http://45.33.34.15:8002/assets/img/top.png" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>
@endsection

{{-- @section("page_scripts")
    <script>
      $(document).ready(async function() {
        const [countProduct, countSalesOrder, countTotalSales, countCustomer, countProductCurrentMonth] = await Promise.all([
            $.get("{{ route('inv.products.count')}}"),
            $.get("{{ route('sales.sales-orders.count')}}"),
            $.get("{{ route('sales.total-sales.count')}}"),
            $.get("{{ route('crm.customer.count')}}"),
        ]);

        $("#total-products").prop('Counter',0).animate({
            Counter: countProduct.count
        }, {
            duration: 500,
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
        $("#total-products").prop('Counter',0).animate({
            Counter: countProduct.count
        }, {
            duration: 500,
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });

        let sales = 0;
        if(countProduct.previous_month == 0){
           sales = 100;
        }else{
          sales = (((countProduct.current_month - countProduct.previous_month)/countProduct.previous_month) * 100) || 0;
        }

        $("#current-month-products").prop('Counter',0).animate({
                    Counter: Math.abs(sales)
                }, {
                    duration: 500,
                    step: function (now) {
                      const className = sales < 0 ? 'color-danger' : 'color-success';
                      const arrowClass = sales < 0 ? 'las la-arrow-down' : 'las la-arrow-up';
                        $(this).text(Math.ceil(now)+'%');
                        $('#sales-block').removeClass('color-danger color-success').addClass(className);   
                        $('#sales-block #icon').removeClass('la-arrow-down la-arrow-up').addClass(arrowClass);
                    } });
                
                
        $("#total-orders").prop('Counter',0).animate({
            Counter: countSalesOrder.count
        }, {
            duration: 500,
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
        // const Ordergrowth = (((countSalesOrder.current_month - countSalesOrder.previous_month)/countSalesOrder.previous_month) * 100);

        let Ordergrowth = 0;

        if( countSalesOrder.previous_month == 0){
           Ordergrowth = 100;
        }else{
          Ordergrowth = (((countSalesOrder.current_month - countSalesOrder.previous_month)/countSalesOrder.previous_month) * 100);
        }

        $("#current-month-total-orders").prop('Counter',0).animate({
                    Counter: Math.abs(Ordergrowth)
                }, {
                    duration: 500,
                    step: function (now) {
                      const className = Ordergrowth < 0 ? 'color-danger' : 'color-success';
                      const arrowClass = Ordergrowth < 0 ? 'las la-arrow-down' : 'las la-arrow-up';
                        $(this).text(Math.ceil(now)+'%');
                        $('#Ordergrowth-block').removeClass('color-danger color-success').addClass(className);   
                        $('#Ordergrowth-block #icon').removeClass('la-arrow-down la-arrow-up').addClass(arrowClass);
                    } 
                });

        $("#total-sales").prop('Counter',0).animate({
            Counter: countTotalSales.count
        }, {
            duration: 500,
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
        let salesTotal = 0;

        if( countTotalSales.previous_month == 0){
           salesTotal = 100;
        }else{
           salesTotal = (((countTotalSales.current_month - countTotalSales.previous_month)/countTotalSales.previous_month) * 100);
        }


        $("#current-month-total-sales").prop('Counter',0).animate({
                    Counter: Math.abs(salesTotal)
                }, {
                    duration: 500,
                    step: function (now) {
                      const className = salesTotal < 0 ? 'color-danger' : 'color-success';
                      const arrowClass = salesTotal < 0 ? 'las la-arrow-down' : 'las la-arrow-up';
                        $(this).text(Math.ceil(now)+'%');
                        $('#salesTotal-block').removeClass('color-danger color-success').addClass(className);   
                        $('#salesTotal-block #icon').removeClass('la-arrow-down la-arrow-up').addClass(arrowClass);
                    } 
                });

        

        $("#total-customers").prop('Counter',0).animate({
            Counter: countCustomer.count
        }, {
            duration: 500,
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });

        let customerTotal = 0;

        if( countCustomer.previous_month == 0){
           customerTotal = 100;
        }else{
           customerTotal = (((countCustomer.current_month - countCustomer.previous_month)/countCustomer.previous_month) * 100);
        }
        

        $("#current-month-customer").prop('Counter',0).animate({
                    Counter: Math.abs(customerTotal)
                }, {
                    duration: 500,
                    step: function (now) {
                      const className = customerTotal < 0 ? 'color-danger' : 'color-success';
                      const arrowClass = customerTotal < 0 ? 'las la-arrow-down' : 'las la-arrow-up';
                        $(this).text(Math.ceil(now)+'%');
                        $('#customerTotal-block').removeClass('color-danger color-success').addClass(className);   
                        $('#customerTotal-block #icon').removeClass('la-arrow-down la-arrow-up').addClass(arrowClass);
                    } 
                });

        

        

        //here more api response for get data
      });
    </script>
@endsection --}}