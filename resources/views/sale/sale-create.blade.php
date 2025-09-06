<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Sale</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
        }
        .card-title {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sales List</h4>
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create-modal">
                            <i class="fas fa-plus"></i> Create Sale
                        </button>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Vat</th>
                                    <th>Discount</th>
                                    <th>Payable</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sales data will be shown here -->
                                <tr>
                                    <td colspan="8" class="text-center">No sales records found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Sale Modal -->
    <div class="modal fade" id="create-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Sale</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Customer</label>
                                <select class="form-control" id="customer" required>
                                    <option value="">Select Customer</option>
                                    <option value="1">John Doe</option>
                                    <option value="2">Jane Smith</option>
                                    <option value="3">Michael Johnson</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="sale-date" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Total Amount</label>
                            <input type="number" class="form-control" id="total" min="0" step="0.01" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">VAT (5%)</label>
                                <input type="number" class="form-control" id="vat" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Discount %</label>
                                <input type="number" class="form-control" id="discount" value="0" min="0" max="100">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Payable</label>
                                <input type="number" class="form-control" id="payable" readonly>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveSale()">Save Sale</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Set today's date as default
        document.getElementById('sale-date').valueAsDate = new Date();
        
        // Simple calculation
        document.getElementById('total').addEventListener('input', calculateAmounts);
        document.getElementById('discount').addEventListener('input', calculateAmounts);
        
        function calculateAmounts() {
            const total = parseFloat(document.getElementById('total').value) || 0;
            const vat = total * 0.05;
            const discountPercent = parseFloat(document.getElementById('discount').value) || 0;
            const discount = total * (discountPercent / 100);
            const payable = total + vat - discount;
            
            document.getElementById('vat').value = vat.toFixed(2);
            document.getElementById('payable').value = payable.toFixed(2);
        }
        
        function saveSale() {
            const customer = document.getElementById('customer').value;
            const total = document.getElementById('total').value;
            
            if (!customer) {
                alert('Please select a customer');
                return;
            }
            
            if (!total || parseFloat(total) <= 0) {
                alert('Please enter a valid total amount');
                return;
            }
            
            // Here you would typically make an AJAX call to save the data
            alert('Sale saved successfully!');
            
            // Close modal
            var modal = bootstrap.Modal.getInstance(document.getElementById('create-modal'));
            modal.hide();
            
            // Reset form
            document.getElementById('save-form').reset();
            document.getElementById('sale-date').valueAsDate = new Date();
        }
    </script>
</body>
</html>