<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Upi Qr</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 25%;
            border: 1px solid gray;
            border-radius: 10px;
            padding: 15px;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                border: 1px solid gray;
                border-radius: 10px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="container">
            <h5 class="mb-3">Generate Upi Qr Code</h5>
            <form action="qr.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" placeholder="Enter amount here">
                </div>
                <div class="mb-3">
                    <label class="form-label">UPI Id</label>
                    <input type="text" name="upi" class="form-control" placeholder="Enter your upi id">
                </div>
                <button type="submit" class="btn btn-primary w-100">Generate Qr</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>