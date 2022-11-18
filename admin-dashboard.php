<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|| Dashboard</title>
    <!-- MATERIAL CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp"
      rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./adminstyles.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
             <div class="logo">
                <img src="asset/logopet.png">
                <h2>PETCo.<span class="danger">ADMIN</span></h2>
             </div>
             <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
             </div>
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="admin-user-accounts.php">
                    <span class="material-icons-sharp">person</span>
                    <h3>Accounts</h3>
                </a>
                <a href="admin-orders.php">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Orders</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>     
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Products</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>
                <a href="admin-content.php">
                    <span class="material-icons-sharp">add</span>
                    <h3>Add Content</h3>
                </a>
                <a href="admin-login.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

             <!---End of Aside-->
        <main>
            <h1>Dashboard</h1>

            <div class="date">
                <input type="date">
            </div>
            
            <div class="insights">
                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Sales</h3>
                                <h1>Php 24,030</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>81%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                <!--------------End of sales-------------->
                <div class="expenses">
                    <span class="material-icons-sharp">bar_chart</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Expenses</h3>
                                <h1>Php 10,200</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36' ></circle>
                                </svg>
                                <div class="number">
                                    <p>62%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                <!--------------End of Expenses-------------->
                <div class="income">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Income</h3>
                                <h1>Php 10,864</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36' ></circle>
                                </svg>
                                <div class="number">
                                    <p>44%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                <!--------------End of Income-------------->
                </div>
                <!--------------End of Insights-------------->
                <div class="recent-orders">
                    <h2>Recent Orders</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Number</th>
                                <th>Payment</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Whiskas</td>
                                <td>85631</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                            <tr>
                                <td>Pedigree</td>
                                <td>85101</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                            <tr>
                                <td>Cat Shampoo</td>
                                <td>85342</td>
                                <td>Due</td>
                                <td class="warning">Pending</td>
                                <td class="primary">Details</td>
                            </tr>
                    
                            
                    </table>
                    <a href="#">Show All</a>
                </div>
            </main>
            <!----------------------------End of Main----------------------->
            
            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>Charlize</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="./asset/user2.jpg">
                        </div>
                    </div>
                </div>
                <!------------End of top--------------------->

                <div class="recent-updates">
                    <h2>Recent Updates</h2>
                    <div class="updates">
                        <div class="update">
                            <div class="profile-photo">
                                <img src=".asset/user1.jpg">
                            </div>
                            <div class="message">
                                <p><b>Alexandra Bautista</b> received her order of
                                Dog Shampoo.</p>
                                <small class="text-muted">2 Minutes Ago</small>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src=".asset/user3.jpg">
                            </div>
                            <div class="message">
                                <p><b>Melody Santiago</b> received her order of
                                Pedigree.</p>
                                <small class="text-muted">5 Minutes Ago</small>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src=".asset/user5.jpg">
                            </div>
                            <div class="message">
                                <p><b>Nickee Dela Cruz</b> received his order of
                                Whiskas.</p>
                                <small class="text-muted">10 Minutes Ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-----------------End of Recent Updates---------------->
                <div class="sales-analytics">
                    <h2>Sales Analytics</h2>
                    <div class="item online">
                        <div class="icon">
                            <span class="material-icons-sharp">shopping_cart</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>ONLINE ORDERS</h3>
                                <small class="text-muted">Last 24 Hours</small>
                            </div>
                            <h5 class="success">+39%</h5>
                            <h3>3849</h3>
                        </div>
                    </div>
                    <div class="item offline">
                        <div class="icon">
                            <span class="material-icons-sharp">local_mall</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>OFFLINE ORDERS</h3>
                                <small class="text-muted">Last 24 Hours</small>
                            </div>
                            <h5 class="danger">-17%</h5>
                            <h3>1100</h3>
                        </div>
                    </div>
                    <div class="item customers">
                        <div class="icon">
                            <span class="material-icons-sharp">person</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>ONLINE ORDERS</h3>
                                <small class="text-muted">New Customers</small>
                            </div>
                            <h5 class="success">+25%</h5>
                            <h3>849</h3>
                        </div>
                    </div>
                    <div class="item add-product">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <h3>Add Product</h3>
                        </div>

                    </div>
                </div>
            </div> 
        </div>
    </div>

    <script src="./orders.js"></script>
    <script src="./admin-dashboard.js"></script>
</body>

</html>