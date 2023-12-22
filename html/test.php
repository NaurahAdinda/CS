1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
<!DOCTYPE html>
<html>
<head>
 <title>Pagination using PHP, MySQLi and Bootstrap</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php 
 include"dbcon.php"; 
 $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
 $page = isset($_GET['page']) ? $_GET['page'] : 1;
 $start = ($page - 1) * $limit;
 $result = $conn->query("SELECT * FROM customers LIMIT $start, $limit");
 $customers = $result->fetch_all(MYSQLI_ASSOC);
  
 $result1 = $conn->query("SELECT count(id) AS id FROM customers");
 $custCount = $result1->fetch_all(MYSQLI_ASSOC);
 $total = $custCount[0]['id']; 
 $pages = ceil( $total / $limit ); 
  
 $Previous = $page - 1;
 $Next = $page + 1;
?> 
<div class="container well" style="margin-top:20px;">
 <h1 class="text-center">Pagination using PHP MySQLi and Bootstrap</h1>
 <div class="row">
   <div class="col-md-10">
    <nav aria-label="Page navigation">
     <ul class="pagination">
        <li>
          <a href="bootstrap-pagination-php-mysql.php?page=<?= $Previous; ?>" aria-label="Previous">
            <span aria-hidden="true">« Previous</span>
          </a>
        </li>
        <?php for($i = 1; $i<= $pages; $i++) : 
       if ($i==$page) {$active = "class='active'"; 
       }else {$active = ""; } 
     ?>
         <li <?php echo $active; ?>><a href="bootstrap-pagination-php-mysql.php?page=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?> 
         
        <li>
          <a href="bootstrap-pagination-php-mysql.php?page=<?= $Next; ?>" aria-label="Next">
            <span aria-hidden="true">Next »</span>
          </a>
        </li>
      </ul>
    </nav>
   </div> 
   <div class="text-center" style="margin-top: 20px; " class="col-md-2">
    <form method="post" action="#">Show
      <select name="limit-records" id="limit-records">
       <option value="10" selected="selected">10</option>
       <?php foreach([10,100,500,1000,5000] as $limit): ?>
        <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
       <?php endforeach; ?>
      </select>
      entries
     </form>
   </div>
 </div>
 <div style="overflow-y: auto;">
   <table id="" class="table table-striped table-bordered">
          <thead>
                 <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Mobile</th>
                     <th>Address</th>
                     <th>Date</th>
                </tr>
            </thead>
          <tbody>
           <?php foreach($customers as $customer) :  ?>
            <tr>
             <td><?= $customer['id']; ?></td>
             <td><?= $customer['name']; ?></td>
             <td><?= $customer['mobile']; ?></td>
             <td><?= $customer['address']; ?></td>
             <td><?= $customer['createdOn']; ?></td>
            </tr>
           <?php endforeach; ?>
          </tbody>
        </table>
  </div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
  $("#limit-records").change(function(){
   $('form').submit();
  })
 })
</script>
<style>
.active {background-color: #337ab7;border-color: #337ab7;}
</style>
</body>
</html>