<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service and Room Charge Calculation with Extras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card {
            display: inline-block;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
            width: 150px;
            text-align: center;
        }
        .card img {
            width: 100px;
            height: 100px;
        }
        .selected {
            border-color: green;
        }
    </style>
    <script>
        let extrasTotal = 0;

        function toggleCard(card, price) {
            if (card.classList.contains('selected')) {
                card.classList.remove('selected');
                extrasTotal -= price;
            } else {
                card.classList.add('selected');
                extrasTotal += price;
            }
            calculateTotal();
        }

        function calculateTotal() {
            // Get selected values from dropdowns and input fields
            let serviceCharge = parseFloat(document.getElementById('serviceCharge').value) || 0;
            let roomCharge = parseFloat(document.getElementById('roomCharge').value) || 0;
            let cleaningCharge = parseFloat(document.querySelector('input[name="cleaningCharge"]:checked').value) || 0;
            let discountType = parseFloat(document.getElementById('discountType').value) || 0;

            // Calculate total before discount and extras
            let totalAmount = serviceCharge + roomCharge + cleaningCharge + extrasTotal;

            // Calculate discount amount
            let discountAmount = (totalAmount * discountType) / 100;

            // Calculate total after applying discount
            let finalTotalAmount = totalAmount - discountAmount;

            // Display the discount amount and final total amount
            document.getElementById('discountAmount').value = discountAmount.toFixed(2);
            document.getElementById('totalAmount').value = finalTotalAmount.toFixed(2);
            document.getElementById('extrasTotal').value = extrasTotal.toFixed(2);
        }
    </script>
</head>
<body>
    <h1>Service and Room Charge Calculation with Extras</h1>
    <form action="process_form.php" method="POST">

    <!-- Contact Information Section -->
         <h2>Contact Information</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="serviceCharge">Service Charge ($):</label>
        <select id="serviceCharge" name="serviceCharge" onchange="calculateTotal()">
            <option value="0">Select Service Charge</option>
            <option value="20">Service Type 1 - $20</option>
            <option value="40">Service Type 2 - $40</option>
            <option value="60">Service Type 3 - $60</option>
        </select><br><br>

        <label for="roomCharge">Room Charge ($):</label>
        <select id="roomCharge" name="roomCharge" onchange="calculateTotal()">
            <option value="0">Select Room Charge</option>
            <option value="50">Room Type 1 - $50</option>
            <option value="80">Room Type 2 - $80</option>
            <option value="100">Room Type 3 - $100</option>
        </select><br><br>

        <label for="cleaningCharge">Cleaning Charge ($):</label><br>
        <input type="radio" id="cleaning15" name="cleaningCharge" value="15" onchange="calculateTotal()">
        <label for="cleaning15">$15</label><br>
        <input type="radio" id="cleaning30" name="cleaningCharge" value="30" onchange="calculateTotal()">
        <label for="cleaning30">$30</label><br>
        <input type="radio" id="cleaning45" name="cleaningCharge" value="45" onchange="calculateTotal()">
        <label for="cleaning45">$45</label><br><br>

        <label for="discountType">Discount Type (%):</label>
        <select id="discountType" name="discountType" onchange="calculateTotal()">
            <option value="0">No Discount</option>
            <option value="5">5% Discount</option>
            <option value="10">10% Discount</option>
            <option value="15">15% Discount</option>
        </select><br><br>

        <label for="extras">Select Extras:</label><br>
        <div class="card" onclick="toggleCard(this, 70)">
        <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b34888eef7173402cfac33/1723025544944/Carpet+Cleaning.png" alt="Carpet Cleaning" loading="lazy">
            <p>Carpet Cleaning</p>
            <p>$70</p>
        </div>
        <div class="card" onclick="toggleCard(this, 80)">
        <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b3488dc79cee0b6e2e5891/1723025549738/Organisation+By+The+Hour.png" alt="Organisation By the Hour" loading="lazy">
            <p>Organisation By</p>
            <p>$80</p>
        </div><br><br>

        <label for="extrasTotal">Extras Total ($):</label>
        <input type="text" id="extrasTotal" name="extrasTotal" readonly><br><br>

        <label for="discountAmount">Discount Amount ($):</label>
        <input type="text" id="discountAmount" name="discountAmount" readonly><br><br>

        <label for="totalAmount">Total Amount ($):</label>
        <input type="text" id="totalAmount" name="totalAmount" readonly><br><br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
