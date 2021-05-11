<!DOCTYPE html>
<html>
<head>
    <Title>VirusTestShop</Title>
    <link rel="shortcut icon" href="http://virustestshop.azurewebsites.net/logo.png">
</head>
<body>
    <script>
        var mysql = require('mysql');

        var con = mysql.createConnection({
            host: "localhost",
            user: "yourusername",
            password: "yourpassword",
            database: "mydb"
        });

        con.connect(function (err) {
            if (err) throw err;
            console.log("Connected!");
            var sql = "INSERT INTO customers (name, address) VALUES ('Company Inc', 'Highway 37')";
            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log("1 record inserted");
            });
        });

    </script>

</body>
</html>