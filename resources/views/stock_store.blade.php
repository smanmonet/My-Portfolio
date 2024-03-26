@extends('layoutMember')
@section('title', 'Stock')
@section('content')
<div class="container">
    <h1>Items</h1>
    <div class="row justify-content-end mb-3">
    <div class="col-auto">
        <a href="/products/create" class="btn btn-success">Add New Item</a>
    </div>
</div>

    <table class="table table-hover table-primary">
        <thead>
            <tr>
                <th>Image</th>
                <th>SKU</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through your items here -->
            @foreach ($products as $item)
            <tr>
                <td>
                <img style= "width: 100px; height: 100px;"
                src="{{ url('images/' . $item->image) }}" alt="Your Image">
                </td>
                <td>{{ $item->productID }}</td>
                <td>{{ $item->productname }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->stock_quantity ?? 0 }}</td>
                <td>
                    @if($item->quantity == 0)
                        Out of Stock
                    @elseif($item->quantity <= $item->Min)
                    Almost
                    @else
                    In Stock
                    @endif
                </td>
                <td><a href="/product/{{ $item->productID }}/edit" class="btn btn-primary">Edit</a></td>
                <td><button type="button" class="btn btn-danger" onclick="openDeleteModal({{ $item->productID }})">Delete</button></td>


            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>


</div>
<script>
    function openDeleteModal(productId) {
        // Set the action attribute of the delete form to include the product ID
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = '/product/' + productId;

        // Open the delete confirmation modal
        var deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        deleteModal.show();
    }
</script>
@endsection