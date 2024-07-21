<html>
  <head>
    <title>home</title>
    <style>
        a {
            color: black;
            text-decoration: none;
            height: 5px;
            width: 5px;
            transition: background-color 0.3s ease;
            padding: 4px 2px;
        }
        a:hover {
            color: white;
            background-color: black;
            text-decoration: none;
            height: 7px;
            width: 7px;
            padding: 5px 6px;
        }
        a:visited {
            color: black;
            text-decoration: none;
            height: 5px;
            width: 5px;
            padding: 4px 2px;
            transition: background-color 0.3s ease;
        }
        a:visited:hover {
            color: black;
            background-color: grey;
            text-decoration: none;
            height: 7px;
            padding: 5px 6px;
            width: 7px;
        }
        .custom-select {
            background-color: white;
            color: black;
            border: 1px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 25px;
            transition: background-color 0.3 ease;
            transition: height 0.3s ease;
        }
        .custom-select:hover {
            background-color: rgb(230, 230, 250);
            color: black;
            border: 2px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 27px;
        }
        .custom-select option {
            background-color: ivory;
            color: black;
            border: 1px solid black;
            width: 200px;
            height: 25px;
        }
        .inputnorm {
            background-color: white; /* Button color on hover */
            padding: 10px 10px;
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 25px;
            transition: background-color 0.3s ease;
            transition: height 0.3s ease;
        }
        .inputnorm:hover {
            background-color: rgb(230, 230, 250); /* Button color on hover */
            padding: 10px 10px;
            color: black; /* Default text color */
            border: 2px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 27px;
        }
        .inputnorm:focus {
            background-color: rgb(230, 230, 250); /* Button color on hover */
            padding: 10px 10px;
            color: black; /* Default text color */
            border: 2px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 27px;
        }
        #searchResults tr:nth-child(even) {
            background-color: #002142;
            color: white;
        }
        #searchResults tr:nth-child(odd) {
            background-color: black;
            color: white;
        }
        .my-button {
            background-color: #fff; /* Default button color */
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
            transition: padding 0.3s ease;
        }
        .my-button:hover {
            background-color: gold; /* Button color on hover */
            padding: 10px 18px;
            color: black; /* Default text color */
            border: 2px solid black;
            border-radius: 4px;
        }
        .table-button {
            background-color: #fff; /* Default button color */
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
            transition: padding 0.3s ease;
        }
        .table-button:hover {
            background-color: grey; /* Button color on hover */
            padding: 6px 12px;
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
        }
        .intable-button {
            background-color: white;
            color: black;
            border: 1px solid black;
            border-radius: 4px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            transition: padding 0.3s ease;
        }
        .intable-button:hover {
            background-color: black;
            padding: 6px 12px;
            color: greenyellow;
            border: 1px solid black;
            border-radius: 4px;
        }
        body {
            text-align: center;
            background-color: black;
            color: grey;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: Yellow;
        }
        h2 {
            font-size: 24px;

        }
        input, select {
            margin: 5px;
            width: 200px;
            
        }
        table {
            width: 70%;
            border-collapse: collapse;

        }
        th, td {
            padding: 8px;
            border: 1px solid grey;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
  </head>
  <body>
    <h1>Company's Record</h1>
    <h3 style="color: white;"><i>by Krushna Nemade</i></h3>
    <br>
    
    <button class="my-button" onclick="location.href='newentry.php'">Add</button>
    <br>
    <br>
    <br>

    <table align="center" id="searchResults">

      <tr style="background-color: ivory; color: black;">
        <th>Company Name</th>
        <th>Date Applied</th>
        <th>Prerequisites</th>
        <th>Status</th>
        <th >Action</th>
      </tr>

      <?php
        include('connection.php');
        error_reporting(E_ALL);

        $query = "SELECT * FROM data ORDER BY `dateApp` DESC";
        $data = mysqli_query($conn, $query);

        $x = 1;
        while($row = mysqli_fetch_assoc($data)) {
          $company = $row['name'];
          $dateA = $row['dateApp'];
          $skills = $row['skills'];
          $status = $row['status'];
          $link = $row['link'];
          $id = $row['id'];

          if (!preg_match("/^https?:\/\//", $link)) {
            $link = "http://" . $link;
          }

          echo "
            <tr>
              <td>$company</td>
              <td>$dateA</td>
              <td>$skills</td>
              <td>$status</td>
              <td>
                <a class='table-button' href='$link' target='_blank'>Visit</a>
                <a class='table-button' href='update.php?id=$id'>Update</a>
                <input type='hidden' id='idc$x' value='$id'>
                <script>
                    function del$x() {
                        var idcall = document.getElementById('idc$x').value;
                        var confirmation = confirm('Are you sure you want to delete this record?');
                        if (confirmation) {
                            window.location.href = 'delete.php?id='+idcall;
                        }
                    }
                </script>
                <a class='table-button' onclick='del$x()'>x</a>
              </td>
            </tr>
          ";

          $x++;
        }
      ?>

    </table>

  </body>
</html>