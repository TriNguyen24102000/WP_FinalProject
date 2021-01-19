<!DOCTYPE html>
<html><head>
    <title>Insert Form</title>
    <link rel="stylesheet" type="text/css" href="css/updateForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container right-panel-active" id="container">
                <form action="checkAddManuForm.php" method="POST">
                    <h1 style="padding-top: 15px"> Manu Profile </h1>
                    <br>
                    <div>
                        <label>Name:   </label>
                        <input type="text" name="name">
                    </div>

                    <br>
                    <span>
                        <label>Email:  </label>
                        <input type="email" name="email">
                    </span>
                    
                    <br>
                    <span>
                        <label>Phone:   </label>
                        <input type="text" name="phone">
                    </span>
                    <br>
                    <button type="submit" style="margin-top:5px" > Insert</button>
                </form>
</script>

</body></html>
