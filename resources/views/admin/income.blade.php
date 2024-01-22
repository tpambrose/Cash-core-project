@extends('admin.layouts.app')

<x-assets.datatables />

@push('page-header')
<div class="col-sm-10">
    <h3 class="page-title">Incomes!</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item active">Incomes</li>
    </ul>
</div>
<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#addIncomeModal">
    Add Income
</button>

                            <!-- Add Income Modal -->
                            <div class="modal fade" id="addIncomeModal" tabindex="-1" role="dialog" aria-labelledby="addIncomeModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addIncomeModalLabel">Add Income</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form for adding income -->
                                            <form method="POST" action="{{ route('addIncome') }}">
                                                @csrf

                                                <!-- Title Field -->
                                                <div class="form-group">
                                                    <label for="addTitle">Title</label>
                                                    <input type="text" class="form-control" id="addTitle" name="title" required>
                                                </div>

                                                <!-- Description Field (if you have a description field) -->
                                                <div class="form-group">
                                                    <label for="addDescription">Description</label>
                                                    <textarea class="form-control" id="addDescription" name="description"></textarea>
                                                </div>

                                                <!-- Amount Field -->
                                                <div class="form-group">
                                                    <label for="addAmount">Amount</label>
                                                    <input type="text" class="form-control" id="addAmount" name="amount" required>
                                                </div>

                                                <!-- Submit Button -->
                                                <button type="submit" class="btn btn-primary">Add Income</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Incomes Table -->

            <div class="card-header">
                <h4 class="card-title">Report</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="incomes-table" class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incomes as $index => $income)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $income['title'] }}</td>
                                <td>{{ $income['amount'] }}</td>
                                <td>{{ $income['date'] }}</td>
                                <td>
                                    <!-- Edit icon with modal trigger -->
                                    <a href="#" data-toggle="modal" data-target="#editModal{{ $index }}">
                                        <i class="fe fe-edit"></i>
                                    </a>

                                    <!-- Delete icon with modal trigger -->
                                    <a href="#" data-toggle="modal" data-target="#deleteModal{{ $index }}">
                                        <i class="fe fe-trash"></i>
                                    </a>
                                </td>
                            </tr>





                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $index }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $index }}">Edit Income</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form for editing -->
                                            <form method="POST" action="{{ route('editIncome', ['id' => $income['id']]) }}">
                                                @csrf
                                                @method('PUT')

                                                <!-- Title Field -->
                                                <div class="form-group">
                                                    <label for="editTitle{{ $index }}">Title</label>
                                                    <input type="text" class="form-control" id="editTitle{{ $index }}" name="title" value="{{ $income['title'] }}" required>
                                                </div>

                                                <!-- Description Field (if you have a description field) -->
                                                <div class="form-group">
                                                    <label for="editDescription{{ $index }}">Description</label>
                                                    <textarea class="form-control" id="editDescription{{ $index }}" name="description">{{ $income['description'] }}</textarea>
                                                </div>

                                                <!-- Amount Field -->
                                                <div class="form-group">
                                                    <label for="editAmount{{ $index }}">Amount</label>
                                                    <input type="text" class="form-control" id="editAmount{{ $index }}" name="amount" value="{{ $income['amount'] }}" required>
                                                </div>

                                                <!-- Submit Button -->
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $index }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $index }}">Delete Income</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Delete confirmation message -->
                                            <p>Are you sure you want to delete this entry?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Delete Button -->
                                            <form method="POST" action="{{ route('deleteIncome', ['id' => $income['id']]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>

                                            <!-- Close Button -->
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
