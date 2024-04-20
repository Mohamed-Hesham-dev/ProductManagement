@extends('admin.layout.master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                </div>
            </div>
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ route('admin.products.create') }}" style="float: right ; padding-top:2px">
                                        <button type="button" class="btn btn-primary btn-min-width mr-1 mb-1">
                                            <i class="ft-align-justify"></i>Add Product
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1"
                                        onclick="printTable()">
                                        <i class="ft-printer"></i> Print
                                    </button>
                                </div>

                                <div class="staff-search-table">
                                    <form id="filterForm">
                                        <div class="row" style="padding: 20px">
                                            <div class="col-12 col-md-6 col-xl-4">
                                                <div class="form-group local-forms cal-icon">
                                                    <label>from</label>
                                                    <input class="form-control" type="date" id="fromDate">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-4">
                                                <div class="form-group local-forms cal-icon">
                                                    <label>To</label>
                                                    <input class="form-control" type="date" id="toDate">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-4">
                                                <div class="doctor-submit" style="margin-top: 30px">
                                                    <button type="button" onclick="filter()"
                                                        class="btn btn-primary submit-list-form me-2">filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <form id="bulkDeleteForm" method="POST"
                                            action="{{ route('admin.products.bulkDelete') }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger mb-2" id="bulkDeleteButton"
                                                onclick="confirmBulkDelete()">Delete Selected</button>
                                            <table class="table table-striped table-bordered zero-configuration"
                                                id="example">
                                                <thead>
                                                    <tr>
                                                        <th>Select</th>
                                                        <th>Category Name</th>
                                                        <th>Product Name</th>
                                                        <th data-orderable="false">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td><input type="checkbox" name="selectedProducts[]"
                                                                    value="{{ $product->id }}"></td>
                                                            <td>{{ $product->category->{'name_' . App::getLocale()} }}</td>
                                                            <td>{{ $product->{'name_' . App::getLocale()} }}</td>
                                                            
                                                            <td>
                                                                <a class="btn btn-primary" title="Edit"
                                                                    href="{{ route('admin.products.edit', $product->id) }}">
                                                                    <i class="la la-eye"></i>
                                                                </a>
                                                                <form
                                                                    action="{{ route('admin.products.destroy', $product->id) }}"
                                                                    method="POST" class="delete-product-form"
                                                                    style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" title="Delete"
                                                                        class="btn btn-danger delete-btn">
                                                                        <i class="la la-ban"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function filter() {
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var lang = '{{ app()->getLocale() == 'en' }}';
            $.ajax({
                url: '{{ route('admin.products.filter') }}',
                type: 'get',
                data: {
                    fromDate: fromDate,
                    toDate: toDate
                },
                success: function(response) {
                    var tableBody = $('#example tbody');
                    tableBody.empty();
                    $.each(response.products, function(index, product) {

                        var categoryName = product.category.name_en;
                        var productName = product.name_en;
                        var formHtml =
                            '<form action="{{ route('admin.products.destroy', ':productId') }}" method="POST">' +
                            '<a class="btn btn-primary" title="Edit" href="{{ route('admin.products.edit', ':productId') }}">' +
                            '<i class="la la-eye"></i>' +
                            '</a>' +
                            '@csrf' +
                            '@method('DELETE')' +
                            '<button type="submit" title="Delete" class="btn btn-danger delete-btn">' +
                            '<i class="la la-ban"></i>' +
                            '</button>' +
                            '</form>';

                        // Replace placeholders in the form HTML with actual product IDs
                        formHtml = formHtml.replace(/:productId/g, product.id);

                        var newRow = '<tr>' +
                            '<td><input type="checkbox" name="selectedProducts[]" value="' + product.id + '"></td>' +
                            '<td>' + categoryName + '</td>' +
                            '<td>' + productName + '</td>' +
                            '<td>' + formHtml + '</td>' + // Adding the form HTML to the table cell
                            '</tr>';
                        tableBody.append(newRow);
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    <script>
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();

            var form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        function confirmBulkDelete() {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover the selected products!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('bulkDeleteForm').submit();
                    }
                });
        }
    </script>

    <script>
        function printTable() {
            // Clone the table
            var tableClone = document.querySelector('#example').cloneNode(true);

            // Remove action column header
            var actionHeader = tableClone.querySelector('thead th:last-child');
            actionHeader.parentNode.removeChild(actionHeader);

            // Remove select column header
            var selectHeader = tableClone.querySelector('thead th:first-child');
            selectHeader.parentNode.removeChild(selectHeader);
            var rows = tableClone.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                row.removeChild(row.lastElementChild);
                row.removeChild(row.firstElementChild);
            });

            // Create a new window and append the cloned table
            var printWindow = window.open('', '_blank');
            printWindow.document.body.innerHTML = '<h1>Product Table</h1>';
            printWindow.document.body.appendChild(tableClone);

            // Print the window
            printWindow.print();
        }
    </script>

 
    
@endsection
