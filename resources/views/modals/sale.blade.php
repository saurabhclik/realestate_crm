<div class="modal fade" id="saleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <form method="POST" action="{{ route('inventory.updateSale') }}">
            @csrf
            <input type="hidden" name="id" id="sale_id">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-shopping-cart me-1"></i> Update Sale Status
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sales_person_id" class="form-label">Sales Person</label>
                        <select name="sales_person_id" id="sales_person_id" class="form-select" required>
                            <option value="">Select Salesperson</option>
                            @foreach ($salespeople as $person)
                            <option value="{{ $person->id }}">{{ $person->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Leads</label>
                        <select name="lead_id" id="lead_id" class="form-select" required>
                            <option value="">Select Lead</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Customer Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Customer Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Customer Phone</label>
                        <input type="tel" id="number" name="number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="inv_status" id="inv_status" class="form-control" required>
                            <option value="hold">Hold</option>
                            <option value="sold">Sold</option>
                            <option value="cancel">Cancel</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update Status
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#sales_person_id').on('change', function() {

            let userId = $(this).val();

            // clear fields
            $('#lead_id').html('<option>Loading...</option>');
            $('#name, #email, #number').val('');

            if (userId) {
                $.ajax({
                    url: "{{ route('inventory.getLeads', ':id') }}".replace(':id', userId),
                    type: 'GET',
                    success: function(data) {

                        let options = '<option value="">Select Lead</option>';

                        data.forEach(function(lead) {
                            options += `<option value="${lead.id}" 
                            data-name="${lead.name}" 
                            data-email="${lead.email}" 
                            data-phone="${lead.phone}">
                            ${lead.name}
                        </option>`;
                        });

                        $('#lead_id').html(options);
                    },
                    error: function() {
                        $('#lead_id').html('<option>Error loading leads</option>');
                    }
                });
            } else {
                $('#lead_id').html('<option value="">Select Lead</option>');
            }
        });

        // ✅ AUTO FILL (UNCOMMENTED + FIXED)
        $('#lead_id').on('change', function() {

            let selected = this.options[this.selectedIndex];

            $('#name').val(selected.getAttribute('data-name') || '');
            $('#email').val(selected.getAttribute('data-email') || '');
            $('#number').val(selected.getAttribute('data-phone') || '');
        });

    });
</script>