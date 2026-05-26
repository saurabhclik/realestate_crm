@foreach($categories as $index => $category)
<tr>
    <td>{{ $index + 1 + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
    <td>{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>
        <button class="btn btn-sm btn-outline-primary"
            onclick="openCategoryModal('edit', { id: {{ $category->id }}, name: '{{ $category->name }}' })"
            data-bs-toggle="modal"
            data-bs-target="#categoryModal">
            <i class="fas fa-edit"></i>
        </button>
    </td>
</tr>
@endforeach
@if($categories->count() == 0)
<tr>
    <td colspan="4" class="text-center">No categories found</td>
</tr>
@endif