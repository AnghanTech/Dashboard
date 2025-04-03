
<?php include 'includes/header.php'; ?>
<div class="container mt-5">
    <h2>Online Payment</h2>
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Make a Payment</h5>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment For</label>
                            <select class="form-control">
                                <option>Membership Fee</option>
                                <option>Services</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
