<?php
include_once('header.php');
?>
<br><br>

<?php
// Get parameters safely
$booking_id       = $_GET['booking_id'] ?? null;
$customization_id = $_GET['customization_id'] ?? null;
$amount           = $_GET['amount'] ?? 0;
$type             = $_GET['type'] ?? 0;

// Ensure only one ID is passed
if (
    ($booking_id && $customization_id) ||
    (!$booking_id && !$customization_id)
) {
    echo "
        <div class='alert alert-danger text-center my-5'>
            Invalid request. Only one ID should be provided.
        </div>
    ";
    include_once('footer.php');
    exit;
}

// Determine which ID to send in form
$id_field_name = $booking_id ? 'booking_id' : 'customization_id';
$id_value      = $booking_id ?? $customization_id;
?>
<br><br>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">

                <br>
                <div class="card-header bg-light text-white text-center">
                    <h2>Payment Details</h2>
                </div>
                <br>

                <div class="card-body">

                    <div class="mb-4 text-center">
                        <h5>Total Amount</h5>
                        <h2 class="text-success">
                            ₹<?php echo htmlspecialchars(number_format($amount, 2)); ?>
                        </h2>
                    </div>

                    <br><br>

                    <form action="makepaymentaction.php" method="post">
                        <input type="hidden"
                               name="<?php echo $id_field_name; ?>"
                               value="<?php echo htmlspecialchars($id_value); ?>">

                        <input type="hidden"
                               name="amount"
                               value="<?php echo htmlspecialchars($amount); ?>">

                        <input type="hidden"
                               name="type"
                               value="<?php echo htmlspecialchars($type); ?>">

                        <br>

                        <div class="mb-3">
                            <label for="card_number" class="form-label">Card Number</label>
                            <input type="text"
                                   class="form-control"
                                   name="card_number"
                                   placeholder="1234567812345678"
                                   required
                                   pattern="[0-9]{16}"
                                   title="Enter a valid 16-digit credit card number (no spaces)">
                        </div>

                        <br>

                        <div class="mb-3">
                            <label for="cardholder" class="form-label">Card Holder</label>
                            <input type="text"
                                   class="form-control"
                                   name="cardholder"
                                   placeholder="John Doe"
                                   required
                                   pattern="[A-Z][a-zA-Z\s]*"
                                   title="Name must start with a capital letter and contain only letters and spaces">
                        </div>

                        <br>

                        <div class="mb-3">
                            <label for="expiry" class="form-label">Expiry Date</label>
                            <input type="text"
                                   class="form-control"
                                   name="expiry"
                                   placeholder="MM/YY"
                                   required
                                   pattern="^(0[1-9]|1[0-2])\/\d{2}$"
                                   title="Enter expiry date in MM/YY format (e.g. 05/28)">
                        </div>

                        <br>

                        <div class="mb-3">
                            <label for="cvc" class="form-label">CVC</label>
                            <input type="text"
                                   class="form-control"
                                   name="cvc"
                                   placeholder="123"
                                   required
                                   pattern="[0-9]{3,4}"
                                   title="Enter a valid 3 or 4 digit CVV">
                        </div>

                        <br><br>

                        <div class="d-grid">
                            <button type="submit"
                                    name="submit"
                                    class="btn btn-success btn-lg">
                                Pay Now ₹<?php echo htmlspecialchars(number_format($amount, 2)); ?>
                            </button>
                        </div>
                    </form>
                </div>

                <br>

                <div class="card-footer text-muted text-center">
                    Secure payment via SSL encryption
                </div>

                <br>

            </div>
        </div>
    </div>
</div>

<br><br>

<?php include_once('footer.php'); ?>