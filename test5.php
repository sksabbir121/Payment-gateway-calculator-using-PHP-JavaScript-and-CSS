<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service and Room Charge Calculation </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .discount-field {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .discount-field label {
            width: 45%;
            text-align: center;
        }
        .extras-container {
            display: flex;
            gap: 20px;
        }
        .extra-card {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }
        .extra-card img {
            width: 100px;
            height: 100px;
        }
        .selected {
            border-color: green;
            background-color: #f0fff0;
        }
    </style>
    <script>
        let extraTotal = 0;

        function toggleExtraCard(card, amount) {
            // Check if card is selected
            if (card.classList.contains('selected')) {
                // Remove selection, subtract amount
                card.classList.remove('selected');
                extraTotal -= amount;
            } else {
                // Add selection, add amount
                card.classList.add('selected');
                extraTotal += amount;
            }
            calculateTotal();
        }

        function calculateTotal() {
            // Get selected values from dropdowns and input fields
            let serviceCharge = parseFloat(document.getElementById('serviceCharge').value) || 0;
            let roomCharge = parseFloat(document.getElementById('roomCharge').value) || 0;
            let cleaningCharge = parseFloat(document.querySelector('input[name="cleaningCharge"]:checked').value) || 0;
            let totalAmount = serviceCharge + roomCharge + cleaningCharge + extraTotal;

            // Calculate discount
            let discount = 0;
            let discountPercentage = document.querySelector('input[name="discount"]:checked');
            if (discountPercentage) {
                let discountValue = parseFloat(discountPercentage.value);
                discount = (discountValue / 100) * totalAmount;
            }

            // Calculate total after discount
            let totalAfterDiscount = totalAmount - discount;

            // Display discount amount and updated total
            document.getElementById('discountAmount').value = discount.toFixed(2);
            document.getElementById('totalAmount').value = totalAfterDiscount.toFixed(2);
        }
    </script>
</head>
<body>
    <h1>Service and Room Charge Calculation </h1>
    <form action="process_form.php" method="POST">
   
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

        <!-- Discount Type -->
        <label for="discount">Discount Type:</label>
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
                One-time Service (No Discount)
            </label>
        </div><br>

        <label for="extras">Select Extras:</label>
        <div class="extras-container">
            <div class="extra-card" onclick="toggleExtraCard(this, 70)">
                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b34888eef7173402cfac33/1723025544944/Carpet+Cleaning.png" alt="Carpet Cleaning">
                <p>Carpet Cleaning</p>
                <p>$70</p>
            </div>
            <div class="extra-card" onclick="toggleExtraCard(this, 70)">
                <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66b3488dc79cee0b6e2e5891/1723025549738/Organisation+By+The+Hour.png" alt="Carpet Cleaning">
                <p>Organisation By</p>
                <p>$80</p>
            </div>
        </div><br>

        <label for="discountAmount">Discount Amount ($):</label>
        <input type="text" id="discountAmount" name="discountAmount" readonly><br><br>

        <label for="totalAmount">Total Amount after Discount ($):</label>
        <input type="text" id="totalAmount" name="totalAmount" readonly><br><br>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</body>
</html>
