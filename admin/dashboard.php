<?php session_start();
include "../navbar1.php";
require("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["approve"])) {
  $orderId = $_POST["orderId"];

  // badel status approved
  $sql = "UPDATE orders SET status = 'Approved' WHERE id = :orderId";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
  $stmt->execute();
  
  // na9es quantite ba3d order approve
  $orderItemsSql = "SELECT items FROM orders WHERE id = :orderId";
  $orderItemsStmt = $pdo->prepare($orderItemsSql);
  $orderItemsStmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
  $orderItemsStmt->execute();
  $orderItemsResult = $orderItemsStmt->fetch(PDO::FETCH_ASSOC);
  
  if ($orderItemsResult && isset($orderItemsResult['items'])) {
      $orderItems = json_decode($orderItemsResult['items'], true); 
      foreach ($orderItems as $itemName => $quantity) {
          $updateQuantitySql = "UPDATE products SET quantite = quantite - :quantity WHERE name = :itemName";
          $updateQuantityStmt = $pdo->prepare($updateQuantitySql);
          $updateQuantityStmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
          $updateQuantityStmt->bindParam(':itemName', $itemName, PDO::PARAM_STR);
          $updateQuantityStmt->execute();
      }
  }

  header("Location: ".$_SERVER['PHP_SELF']);
  exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reject"])) {
    $orderId = $_POST["orderId"];

    // reject
    $sql = "UPDATE orders SET status = 'Rejected' WHERE id = :orderId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
  <!-- Favicons -->
  <link href="../assets2/img/favicon.png" rel="icon">
  <link href="../assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 
  <link href="../assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets2/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets2/vendor/simple-datatables/style.css" rel="stylesheet">


  <link href="../assets2/css/style.css" rel="stylesheet">

  
  <style>
    #sidebar {
    background-color:black; 
    padding-top: 70px; 
    height: 100vh; 
    position: fixed; 
    top: 0;
    left: 0;
    width: 250px; 
    overflow-y: auto; 
}

        .main {
            margin-left: 264px;
        }

        .content {
            padding: 20px;
            background-color: #f0f0f0;
        }

        .sidebar-logo {
            padding: 1.15rem 1.5rem;
        }

        .sidebar-logo a {
            color: #e9ecef;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 0;
        }

        .sidebar-header {
            color: #e9ecef;
            font-size: .75rem;
            padding: 1.5rem 1.5rem .375rem;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #e9ecef;
            position: relative;
            display: block;
            font-size: 1rem;
        }

        .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }
  </style>
</head>

<body>
    


  <!-- ======= Header ======= -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav">
            <li class="sidebar-header">
                Tools & Components
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#categories"
                    aria-expanded="false" aria-controls="categories">
                    <i class="fa-regular fa-file-lines pe-2"></i>
                    Categories
                </a>
                <ul id="categories" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="All">ALL</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="pc">PC</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="console">Console</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="tv">TV</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link filter-category" data-category="electromenager">Electroménager</a>
                    </li>
                </ul>
            </li>

           
            
        </ul>

  </aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
       
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <a href="#orders" class="card-title">Orders <span>| Today</span></a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <h6>
                        <?php 
                        // total number of orders
                        $sql = "SELECT COUNT(*) as orderCount FROM orders";
                        $stmt = $pdo->query($sql);
                        $row = $stmt->fetch();

                        echo $row['orderCount'];
                        ?>
                        </h6>

                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <a class="card-title">Revenue <span>| This Month</span></a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                    <h6>
                      <?php 
                      // mad5oul total
                      $sql = "SELECT SUM(totalprice) AS totalRevenue FROM orders";
                      $stmt = $pdo->query($sql);
                      $row = $stmt->fetch();

                      
                      $totalRevenue = '$' . number_format($row['totalRevenue'], 2);
                      echo $totalRevenue;
                      ?>
                      </h6>

                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
    <a href="#user" class="card-title">Customers <span> | This Year</span></a>
    
    <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-people"></i>
        </div>
        <div class="ps-3">
        <?php
              // total number of customers
              $countQuery = "SELECT COUNT(*) AS totalUsers FROM users";
              $countResult = $pdo->query($countQuery);
              if ($countResult) {
                  $row = $countResult->fetch(PDO::FETCH_ASSOC);
                  // -1 5atr admin
                  $totalUsers = $row['totalUsers'] -1 ;
                  echo "<h6>$totalUsers</h6>";
              } else {
                  echo "<h6>0</h6>";
              }
              ?>
                     <span class="text-muted small pt-2">Total Users</span>
                  </div>
              </div>
          </div>

              </div>

            </div><!-- End Customers Card -->
            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

           <!-- Recent Sales -->
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>
        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Recent Sales <span>| Today</span></h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Customer</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // log of recent sales
          require('../connection.php');
          $query = "SELECT * FROM orders";
          $stmt = $pdo->query($query);

          if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              echo "<th scope='row'><a href='#'>#" . htmlspecialchars($row['id']) . "</a></th>";
              echo "<td>" . htmlspecialchars($row['customer']) . "</td>";
              echo "<td>$" . htmlspecialchars($row['totalprice']) . "</td>";
              echo "<td>";
              if ($row['status'] == 'Approved') {
                echo "<span class='badge bg-success'>" . htmlspecialchars($row['status']) . "</span>";
              } elseif ($row['status'] == 'Pending') {
                echo "<span class='badge bg-warning'>" . htmlspecialchars($row['status']) . "</span>";
              } elseif ($row['status'] == 'Rejected') {
                echo "<span class='badge bg-danger'>" . htmlspecialchars($row['status']) . "</span>";
              }
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='4'>No sales found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- End Recent Sales -->


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="../assets2/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="../assets2/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="../assets2/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="../assets2/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="../assets2/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
            





<!-- Orders -->
<div class="col-12">
    <div class="card top-selling overflow-auto" id="orders">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body pb-0">
            <h5 class="card-title">Orders <span>| Today</span></h5>

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th class="no-sort text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // approve and reject orders panel
                    $sql = "SELECT id, customer, totalprice, date, status FROM orders WHERE status = 'Pending'";
                    $stmt = $pdo->query($sql);

                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td><a href=\"#\" class=\"text-primary fw-bold\">" . htmlspecialchars($row['customer']) . "</a></td>";
                        echo "<td>$" . htmlspecialchars($row['totalprice']) . "</td>";
                        echo "<td class=\"fw-bold\">" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td class=\"fw-bold text-center\">";

                        echo "<form method='post' style='display:inline'>";
                        echo "<input type='hidden' name='orderId' value='" . $row['id'] . "'>";
                        echo "<button class=\"btn btn-success pl-2 pr-2 btn-sm mr-1\" type='submit' name='approve'>Approve</button>";
                        echo "</form>";

                        echo "<form method='post' style='display:inline'>";
                        echo "<input type='hidden' name='orderId' value='" . $row['id'] . "'>";
                        echo "<button class=\"btn btn-outline-danger pl-2 pr-2 btn-sm ml-1\" type='submit' name='reject'>Reject</button>";
                        echo "</form>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
<!-- End Orders -->



            <div class="card top-selling overflow-auto">

<div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
            <h6>Filter</h6>
        </li>
        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
</div>

<?php
// show the users
require('../connection.php');
$query = "SELECT id, name, email, password FROM users";
$stmt = $pdo->query($query);

if (!$stmt) {
    die("Database query failed: " . $pdo->errorInfo()[2]); 
}

function deleteUser($userId, $pdo) {
    $query = "DELETE FROM users WHERE id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $success = $stmt->execute();
    if (!$success) {
        die("Error deleting user: " . $stmt->errorInfo()[2]);
    }
}
?>

<div class="card-body pb-0" id="user">
    <h5 class="card-title">Users <span>| Today</span></h5>

    <table class="table table-borderless">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th class="no-sort text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['password']); ?></td>
                <td class="text-center text-nowrap">
                    <a href="#" class="btn btn-first pl-2 pr-2 btn-sm ml-1 mr-1" title="View details">
                        <i class="fas fa-binoculars"></i>
                    </a>
                    <form action="supprimer_user.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-outline-danger pl-2 pr-2 btn-sm ml-1 mr-1" title="Remove" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>
</div>

            
         
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    </div>
    <div class="credits">

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets2/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets2/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets2/vendor/echarts/echarts.min.js"></script>
  <script src="../assets2/vendor/quill/quill.min.js"></script>
  <script src="../assets2/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets2/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets2/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets2/js/main.js"></script>

</body>

</html>