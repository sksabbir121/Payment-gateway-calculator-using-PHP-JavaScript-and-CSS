<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service and Room Charge Calculation with Extras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Center the form on the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            padding: 80px;
            background: #eee8e7;
        }

        .form-container {
            background-color: #FFF;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Style for the two-column layout */
        .input-section {
            border-right: 2px solid #e9ecef;
        }

        .total-section {
            padding-left: 30px;
        }

        .extra-card {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .extra-card img {
            width: 100px;
            height: 100px;
        }

        .extra-card.selected {
            border-color: green;
            background-color: #f0fff0;
        }

        .btn-submit {
            margin-top: 20px;
        }

        .discount-field label {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
    </style>
    <script>
        let extraTotal = 0;

        function toggleExtraCard(card, amount) {
            if (card.classList.contains('selected')) {
                card.classList.remove('selected');
                extraTotal -= amount;
            } else {
                card.classList.add('selected');
                extraTotal += amount;
            }
            calculateTotal();
        }

        function calculateTotal() {
            let serviceCharge = parseFloat(document.getElementById('serviceCharge').value) || 0;
            let roomCharge = parseFloat(document.getElementById('roomCharge').value) || 0;
            let cleaningCharge = parseFloat(document.querySelector('input[name="cleaningCharge"]:checked').value) || 0;
            let totalAmount = serviceCharge + roomCharge + cleaningCharge + extraTotal;

            let discount = 0;
            let discountPercentage = document.querySelector('input[name="discount"]:checked');
            if (discountPercentage) {
                let discountValue = parseFloat(discountPercentage.value);
                discount = (discountValue / 100) * totalAmount;
            }

            let totalAfterDiscount = totalAmount - discount;

            document.getElementById('discountAmount').value = discount.toFixed(2);
            document.getElementById('totalAmount').value = totalAfterDiscount.toFixed(2);
        }
    </script>
</head>
<body>
    <div class="container form-container">
        <h1 class="form-title">Service and Room Charge Calculation</h1>
        <form action="process_form.php" method="POST" class="row">
            <!-- User Information at the top -->
            <div class="col-12 mb-4">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required><br>
            </div>

            <!-- Left part (Input section) -->
            <div class="col-md-6 input-section">
                <label for="serviceCharge">Service Charge ($):</label>
                <select id="serviceCharge" name="serviceCharge" class="form-control" onchange="calculateTotal()">
                    <option value="0">Select Service Charge</option>
                    <option value="20">Service Type 1 - $20</option>
                    <option value="40">Service Type 2 - $40</option>
                    <option value="60">Service Type 3 - $60</option>
                </select><br>

                <label for="roomCharge">Room Charge ($):</label>
                <select id="roomCharge" name="roomCharge" class="form-control" onchange="calculateTotal()">
                    <option value="0">Select Room Charge</option>
                    <option value="50">Room Type 1 - $50</option>
                    <option value="80">Room Type 2 - $80</option>
                    <option value="100">Room Type 3 - $100</option>
                </select><br>

                <label>Cleaning Charge ($):</label><br>
                <input type="radio" id="cleaning15" name="cleaningCharge" value="15" onchange="calculateTotal()">
                <label for="cleaning15">$15</label><br>
                <input type="radio" id="cleaning30" name="cleaningCharge" value="30" onchange="calculateTotal()">
                <label for="cleaning30">$30</label><br>
                <input type="radio" id="cleaning45" name="cleaningCharge" value="45" onchange="calculateTotal()">
                <label for="cleaning45">$45</label><br><br>

                <!-- Discount Type -->
                <label>Discount Type:</label>
                <div class="discount-field">
                    <label>
                        <input type="radio" name="discount" value="5" onchange="calculateTotal()"> 
                        Monthly (Save 5%)
                    </label>
                    <label>
                        <input type="radio" name="discount" value="10" onchange="calculateTotal()"> 
                        Fortnightly (Save 10%)
                    </label>
                    <label>
                        <input type="radio" name="discount" value="15" onchange="calculateTotal()"> 
                        Weekly (Save 15%)
                    </label>
                    <label>
                        <input type="radio" name="discount" value="0" onchange="calculateTotal()"> 
                        One-time Service
                    </label>
                </div><br>

                <!-- Extras -->
                <label>Select Extras:</label>
                <div class="extra-card" onclick="toggleExtraCard(this, 70)">
                    <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b34888eef7173402cfac33/1723025544944/Carpet+Cleaning.png"  alt="Carpet Cleaning">
                    <p>Carpet Cleaning</p>
                    <p>$70</p>
                </div>
                <div class="extra-card" onclick="toggleExtraCard(this, 70)">
                    <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b3488dc79cee0b6e2e5891/1723025549738/Organisation+By+The+Hour.png" alt="Organisation By">
                    <p>Carpet Cleaning</p>
                    <p>$80</p>
                </div><br>
            </div>

            <!-- Right part (Discount & Total) -->
            <div class="col-md-6 total-section">
                <label for="discountAmount">Discount Amount ($):</label>
                <input type="text" id="discountAmount" name="discountAmount" class="form-control" readonly><br>

                <label for="totalAmount">Total Amount after Discount ($):</label>
                <input type="text" id="totalAmount" name="totalAmount" class="form-control" readonly><br>

                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
