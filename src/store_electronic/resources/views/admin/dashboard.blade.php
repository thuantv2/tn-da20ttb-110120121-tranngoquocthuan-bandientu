@extends('admin_layout')
@section('admin_content')

 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Danh thu hôm nay</p>
                    <h5 class="font-weight-bolder mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Số lượng sản phẩm</p>
                    <h5 class="font-weight-bolder mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Tổng số Khách hàng</p>
                    <h5 class="font-weight-bolder mb-0">
                      <span class="text-danger text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Số lượng Đơn hàng</p>
                    <h5 class="font-weight-bolder mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      </div>
    </div>
      
    
    
    <!-- jQuery -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Datepicker and Morris.js Chart</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <!-- Morris.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <style>
        .ui-datepicker {
            z-index: 9999 !important;
        }
        .col-md-6 h6{
          text-align: center;
          font-size: 25px;
        }
        /* .donut-chart {
          float: left; 
          margin-right: 20px; 
          width: 50%; 
        } */
        /* .row {
            display: flex;
            flex-wrap: wrap;
        }
        .donut-chart {
            width: 200px;
            height: 200px;
            margin-right: 50px;
        }
        .title_thongke {
          width: 100%;
          margin-bottom: 20px;
          margin-left:12%;
          font-size: 25px;
        } */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Căn giữa các hàng */
        }
        .donut-chart {
            width: 300px; /* Độ rộng của mỗi biểu đồ */
            height: 300px; /* Chiều cao của mỗi biểu đồ */
            margin: 10px;
        }
        .title_thongke {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <form autocomplete="off">
        @csrf
        <div class="col-md-6">
            <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
        </div>
        <div class="col-md-6">
            <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
            
        </div>
        <div class="col-md-6">
            <p>
                Lọc theo:
                <select class="dashboard-filter form-control" id="dashboard-filter">
                    <option value="tatca">Tất cả</option>
                    <option value="7ngay">7 ngày qua</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="thangnay">Tháng này</option>
                    <option value="thang9">Tháng 9</option>
                </select>
            </p>
            <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
        </div>
    </form>

    <div id="myfirstchart" style="height: 250px;"></div>

    <script>
        $(document).ready(function() {
    var chart; // Biến biểu đồ toàn cục

    // Khởi tạo biểu đồ Morris.js
    chart = new Morris.Bar({
        element: 'myfirstchart',
        barColors: ['#3498db', '#e74c3c', '#2ecc71', '#9b59b6', '#f1c40f'],
        pointFillColors: ['#ffffff'],
        pointStrokeColors: ['black'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        parseTime: false,
        xkey: 'period',
        ykeys: ['order', 'sales', 'profit', 'quantity'],
        labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
    });

    // Khởi tạo datepicker
    $("#datepicker, #datepicker2").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
    });

    // AJAX request ban đầu để lấy dữ liệu biểu đồ
    chart30daysorder();

    // Hàm để lấy dữ liệu ban đầu của biểu đồ
    function chart30daysorder() {
        $.ajax({
            url: "{{ URL::to('/laravel/php/days-order') }}", // Sử dụng route của bạn
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                chart.setData(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Xử lý sự kiện khi click vào nút lọc dữ liệu
    $('#btn-dashboard-filter').click(function() {
        var _token = '{{ csrf_token() }}';
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        var dashboard_value = $('#dashboard-filter').val();

        $.ajax({
            url: "{{ URL::to('/laravel/php/filter-by-date1') }}", // Sử dụng route của bạn
            method: "POST",
            dataType: "JSON",
            data: {
                from_date: from_date,
                to_date: to_date,
                dashboard_value: dashboard_value,
                _token: _token
            },
            success: function(data) {
                chart.setData(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});


    </script>

     <div class="row">
        <h6 class="title_thongke">THỐNG KÊ SỐ SẢN PHẨM, ĐƠN HÀNG</h6>
        <div id="donut1" class="donut-chart"></div>
        <div id="donut2" class="donut-chart"></div>
        <div id="donut3" class="donut-chart"></div>
        <div id="donut4" class="donut-chart"></div>
        <div id="donut5" class="donut-chart"></div>
    </div>

    <script>
         $(document).ready(function() {
            var colorDanger = "#FF1744";
            $.ajax({
                url: '/admin/statistics',
                method: 'GET',
                success: function(data) {
                    Morris.Donut({
                        element: 'donut1',
                        resize: true,
                        colors: ['#E0F7FA', '#B2EBF2'],
                        data: [
                            {label: "Tổng sản phẩm", value: data.total_products}
                        ]
                    });
                    Morris.Donut({
                        element: 'donut2',
                        resize: true,
                        colors: ['#80DEEA', '#4DD0E1'],
                        data: [
                            {label: "Tổng số đơn đặt hàng", value: data.total_orders}
                        ]
                    });
                    Morris.Donut({
                        element: 'donut3',
                        resize: true,
                        colors: ['#26C6DA', '#00BCD4'],
                        data: [
                            {label: "Tổng số đơn hàng đã hoàn thành", value: data.completed_orders}
                        ]
                    });
                    Morris.Donut({
                        element: 'donut4',
                        resize: true,
                        colors: ['#0097A7', '#00838F'],
                        data: [
                            {label: "Tổng số đơn hàng đã huỷ", value: data.canceled_orders}
                        ]
                    });
                    Morris.Donut({
                        element: 'donut5',
                        resize: true,
                        colors: ['#00ACC1', '#00ACC1'],
                        data: [
                            {label: "Tổng số khách hàng", value: data.active_users}
                        ]
                    });
                }
            });
        });
    </script>

<div id="best-selling-products">
    <h3>Danh sách sản phẩm bán chạy nhất</h3>
    <select id="filter-products">
        <option value="">Tất cả</option>
        <option value="1">Điện thoại</option>
        <option value="2">Laptop</option>
        <!-- Thêm các tùy chọn khác nếu cần -->
    </select>
    <ul id="best-selling-products-list">
        <!-- Các sản phẩm sẽ được thêm vào đây bằng JavaScript -->
    </ul>
</div>

<script>
    // Lấy token CSRF từ meta tag của Laravel
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        // Gửi yêu cầu AJAX khi trang được tải
        $.ajax({
            url: "{{ URL::to('/laravel/php/filter.best.selling.products') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Thêm token CSRF vào header của yêu cầu
            },
            data: {
                // Các tham số lọc nếu cần thiết
            },
            success: function(response) {
                // Xử lý dữ liệu trả về và hiển thị lên giao diện
                var productsList = $('#best-selling-products-list');
                productsList.empty(); // Xóa nội dung cũ

                if (response.length > 0) {
                    $.each(response, function(index, product) {
                        // Tạo một mục sản phẩm và thêm vào danh sách
                        var listItem = $('<li></li>');
                        listItem.html(product.product_name + ' - Số lượng bán: ' + product.total_quantity);
                        productsList.append(listItem);
                    });
                } else {
                    productsList.append('<li>Không có sản phẩm nào được tìm thấy.</li>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error); // Log lỗi nếu có
            }
        });
    });
</script>





  <!-- <div class="row">
    <div class="col-sm-6 text-center">
      <label class="label label-success">Doanh thu hôm nay</label>
      <div id="area-chart"></div>
    </div>
    <div class="col-sm-6 text-center">
      <label class="label label-success">Khách hàng mới</label>
      <div id="line-chart"></div>
    </div>
    <div class="col-sm-6 text-center">
      <label class="label label-success">Số người dùng hôm nay</label>
      <div id="bar-chart"></div>
    </div>
    <div class="col-sm-6 text-center">
      <label class="label label-success">Số lượng mua sắmt</label>
      <div id="stacked"></div>
    </div>
    <div class="col-sm-6 col-sm-offset-3 text-center">
      <label class="label label-success">TỔNG SẢN PHÂN</label>
      <div id="pie-chart"></div>
    </div>
  </div> -->

@endsection 


