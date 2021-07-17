<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP based users AJAX search</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script>
        function showSuggestion(str) {
            // If field is empty
            if(str.length == 0) {
                // Clear and exit
                document.getElementById('output').innerHTML = '';
                return;
            }
            // If field is not empty - run AJAX Request
            else {
                // Create an XMLHttpRequest object
                let xhr = new XMLHttpRequest();
                // Define a callback function to be executed when the server response is ready
                xhr.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById('output').innerHTML = this.responseText;
                    }
                }
                // Open the XMLHttpRequest object and send the AJAX request to PHP file where str variable holds the content of the input field
                xhr.open("GET", "result.php?q=" + str, true);
                xhr.send();
            }
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Website</a>
        </div>
    </nav>
    <div class="container pt-md-1 pb-md-4 mt-3">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="bd-title mt-0">Search Users</h1>
                <p class="bd-lead">Quickly get a project started with any of our examples ranging from using parts of the framework to custom components and layouts.</p>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter user's name..." onkeyup="showSuggestion(this.value)">
                    </div>
                </form>
                <div id="output"></div>
            </div>
        </div>
</body>

</html>