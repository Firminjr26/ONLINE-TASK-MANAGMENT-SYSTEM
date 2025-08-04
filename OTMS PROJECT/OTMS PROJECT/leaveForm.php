<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 50%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-warning {
            background-color: yellow;
            border: none;
            color: black;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            width: 10%;

        }

        .btn-warning:hover {
            background-color: gold;
        }

        h3 {
            color: white;
        }

        .form-group label {
            color: lightskyblue;
        }
    </style>
</head>

<body>
    <b>
        <h3>APPLY LEAVE</h3><br>
    </b>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-group" name="subject" placeholder="leave Subject goes here.....">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" row="3" cols="40" name="message" placeholder="Type Message...">
                    </textarea>
                </div>
                <input type="submit" class="btn btn-warning" name="submit_leave" value="submit">

            </form>
        </div>
    </div>
</body>

</html>