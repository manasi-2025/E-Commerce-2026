
<script>
    $(document).on('click', '.add-product', function (e) {
        e.preventDefault();
        $('#addProduct').modal('show');
    });
   
    $(document).on('click', '.edit-product', function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '/products/edit',
            type: 'POST',
            data: { id: id },
            success: function (res) {

                let product = res.data;

                $('#editProductForm').attr('action', '/products/' + product.id);

                $('#edit_name').val(product.name);
                $('#edit_price').val(product.price);

                let imagesHtml = '';
                if (product.images.length > 0) {
                    product.images.forEach(img => {
                        imagesHtml += `
                            <img src="/images/${img.image_path}" width="60" class="me-2 mb-2">
                        `;
                    });
                }
                $('#existing_images').html(imagesHtml);

                $('#editProduct').modal('show');
            }
        });
    });

    $(document).on('click', '.delete-product', function () {

        let id = $(this).data('id');
        let row = $(this).closest('tr');

        Swal.fire({
            title: 'Are you sure?',
            text: "This product and its images will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `/products/${id}`,
                    type: 'DELETE',
                    success: function (res) {

                        if (res.status) {
                            Swal.fire(
                                'Deleted!',
                                'Product has been deleted.',
                                'success'
                            );

                            row.fadeOut(500, function () {
                                $(this).remove();
                            });
                        }
                    }
                });

            }
        });
    });
</script>
