@extends('admin.layout.master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ route('admin.categories.create') }}" style="float: right ; padding-top:2px">
                                        <button type="button" class="btn btn-primary btn-min-width mr-1 mb-1">
                                            <i class="ft-align-justify"></i>Add Category
                                        </button>
                                    </a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th data-orderable="false">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->{'name_' . App::getLocale()} }}</td>
                                                        <td>
                                                            <form
                                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-primary" title="Edit"
                                                                    href="{{ route('admin.categories.edit', $category->id) }}">
                                                                    <i class="la la-eye"></i>
                                                                </a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Select all delete buttons
        var deleteButtons = document.querySelectorAll('.delete-btn');
    
        // Add event listener to each delete button
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default form submission
    
                var form = this.parentNode; // Get the form element
    
                // Display SweetAlert confirmation dialog
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
                        // If user confirms, submit the form for deletion
                        form.submit();
                    }
                });
            });
        });
    </script>
    
@endsection
