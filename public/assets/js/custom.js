function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
      $('#imagePreview').hide();
      $('#imagePreview').fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$('#imageUpload').change(function () {
  readURL(this);
});

// $(document).ready(function() {
//   $('#productForm').parsley();

//     // Form submission
//     $('#productForm').on('submit', function(e) {
//         e.preventDefault();
//         if ($(this).parsley().isValid()) {

//         // Create FormData object
//         var formData = new FormData(this);
        
//         // Disable submit button
//         $('#submitBtn').prop('disabled', true).html(
//             '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
//         );

//         $.ajax({
//             url: $(this).attr('action'),
//             type: 'POST',
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function(response) {
//                 // Show success message
//                 Swal.fire({
//                     title: 'Success!',
//                     text: response.message,
//                     icon: 'success',
//                     confirmButtonText: 'OK'
//                 }).then((result) => {
//                     if (result.isConfirmed) {
//                         // Redirect to products list
//                         window.location.href = response.redirect_url;
//                     }
//                 });
//                 $('#productForm')[0].reset();
//             },
//             error: function(xhr) {
//                 // Enable submit button
//                 $('#submitBtn').prop('disabled', false).html('Add Product');
                
//                 if (xhr.status === 422) {
//                     // Validation errors
//                     var errors = xhr.responseJSON.errors;
//                     // Clear previous errors
//                     $('.invalid-feedback').remove();
//                     $('.is-invalid').removeClass('is-invalid');
                    
//                     // Show new errors
//                     $.each(errors, function(key, value) {
//                         var input = $('[name="' + key + '"]');
//                         input.addClass('is-invalid');
//                         input.after('<div class="invalid-feedback">' + value[0] + '</div>');
//                     });

//                     // Show error message
//                     Swal.fire({
//                         title: 'Error!',
//                         text: 'Please check the form for errors',
//                         icon: 'error',
//                         confirmButtonText: 'OK'
//                     });
//                 } else {
//                     // Server error
//                     Swal.fire({
//                         title: 'Error!',
//                         text: 'Something went wrong on the server',
//                         icon: 'error',
//                         confirmButtonText: 'OK'
//                     });
//                 }
//             }
//         });
//     });

//     // Image preview
//     function readURL(input, previewId) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();
            
//             reader.onload = function(e) {
//                 $('#' + previewId).attr('src', e.target.result);
//             }
            
//             reader.readAsDataURL(input.files[0]);
//         }
//     }

//     // Preview for each image input
//     $('input[type="file"]').each(function() {
//         var input = $(this);
//         var previewId = input.attr('id') + 'Preview';
        
//         // Add preview image element after input
//         input.after('<img id="' + previewId + '" src="#" alt="Preview" class="mt-2 img-thumbnail" style="max-height: 200px; display: none;"/>');
        
//         // Handle change event
//         input.on('change', function() {
//             readURL(this, previewId);
//             $('#' + previewId).show();
//         });
//     });
// });

$(document).ready(function() {
  $('#productForm').parsley();

  // Form submission
  $('#productForm').on('submit', function(e) {
      if ($(this).parsley().isValid()) {
          e.preventDefault(); // Prevent default form submission

          // Create FormData object
          var formData = new FormData(this);
          
          // Disable submit button and show loading
          $('#submitBtn').prop('disabled', true).html(
              '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
          );

          $.ajax({
              url: $(this).attr('action'),
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                  Swal.fire({
                      title: 'Success!',
                      text: response.message,
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = response.redirect_url;
                      }
                  });

                  // Reset form and enable button
                  $('#productForm')[0].reset();
                  $('#imagePreview').src = '';
                  $('#submitBtn').prop('disabled', false).html('Add Product');
              },
              error: function(xhr) {
                  $('#submitBtn').prop('disabled', false).html('Add Product');

                  if (xhr.status === 422) {
                      var errors = xhr.responseJSON.errors;
                      $('.invalid-feedback').remove();
                      $('.is-invalid').removeClass('is-invalid');

                      $.each(errors, function(key, value) {
                          var input = $('[name="' + key + '"]');
                          input.addClass('is-invalid').after('<div class="invalid-feedback">' + value[0] + '</div>');
                      });

                      Swal.fire({
                          title: 'Error!',
                          text: 'Please check the form for errors',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      });
                  } else {
                      Swal.fire({
                          title: 'Error!',
                          text: 'Something went wrong on the server',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      });
                  }
              }
          });
      }
  });

  // Image preview function
  function readURL(input, previewId) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#' + previewId).attr('src', e.target.result).show();
          };
          reader.readAsDataURL(input.files[0]);
      }
  }

  // Apply image preview to all file inputs
    $('input[type="file"]').each(function() {
        var input = $(this);
        var previewId = input.attr('id') + 'Preview';
        var submitBtn = $('#submitBtn').text();
        if(submitBtn == 'Add Product'){
            // Append preview image after input
            input.after('<img id="' + previewId + '" src="#" class="mt-2 img-thumbnail" style="max-height: 200px; display: none;"/>');
        }else{
            // Append preview image after input
        }
        // Show preview on file select
        input.on('change', function() {
            readURL(this, previewId);
        });
    });
});
$(document).ready(function() {
  $('#categoryForm').parsley();
  // Category form submission
  $('#categoryForm').on('submit', function(e) {
      e.preventDefault();
      
      const categoryId = $('#category_id').val(); // Hidden input for category ID when editing
   
      // Show loading state
      let saveCategoryBtn = $('#saveCategoryBtn');
      let saveCategoryBtnText = $('#saveCategoryBtn').text();
  
              // Disable button and show spinner
          saveCategoryBtn.prop('disabled', true).html(
              '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Saving...'
          );
      // Reset previous errors
      $('.is-invalid').removeClass('is-invalid');
      $('.invalid-feedback').empty();

      $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          data: $(this).serialize(),
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
              // Add new option to category select
              $('#category_id').append(new Option(response.category.name, response.category.id, true, true));
              
              // Reset form and close modal
              if (categoryId) {
                $('#categoryForm')[0].reset();
            }
              $('#addCategoryModal').modal('hide');

              // Show success message
              Swal.fire({
                  title: 'Success!',
                  text: response.message,
                  icon: 'success',
                  confirmButtonText: 'OK'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = response.redirect_url;
                }
            });
          },
          error: function(xhr) {
              if (xhr.status === 422) {
                  // Validation errors
                  var errors = xhr.responseJSON.errors;
                  $.each(errors, function(key, name) {
                      $('#category_' + key).addClass('is-invalid');
                      $('#category-' + key + '-error').text(name);
                  });
              }
              
              // Show error message
              Swal.fire({
                  title: 'Error!',
                  text: response.message,
                  icon: 'error',
                  confirmButtonText: 'OK'
              });
          },
          complete: function() {
              // Reset button state
              $('#saveCategoryBtn').prop('disabled', false).html(saveCategoryBtnText);
          }
      });
  });
});
$(document).ready(function() {
    function toggleCourseFields() {
        const selectedOption = $('#category_id option:selected');
        const categoryType = selectedOption.data('type');


        if (categoryType === 'Course') {
            $('#courseFields').slideDown('fast');
            $('#courseFields input, #courseFields select').each(function() {
                if ($(this).attr('id') === 'course_url' || $(this).attr('id') === 'course_status') {
                    $(this).prop('disabled', false).prop('required', true);
                }
            });
        } else {
            $('#courseFields').slideUp('fast');
            $('#courseFields input, #courseFields select').each(function() {
                $(this).prop('disabled', true).prop('required', false);
                if ($(this).attr('type') !== 'file') {
                    $(this).val('');
                } else {
                    $(this).val(null);
                }
            });
        }
    }

    // Initial check on page load
    toggleCourseFields();
    
    // Category change event
    $('#category_id').on('change', toggleCourseFields);
});
$(document).ready(function() {
    $('#subCategoryForm').parsley();
    // Subcategory form submission
    $('#subCategoryForm').on('submit', function(e) {
        e.preventDefault();
        let saveSubCategoryBtn = $('#savesubCategoryBtn');
        let saveSubCategoryBtnText = $('#savesubCategoryBtn').text();

            // Disable button and show spinner
        saveSubCategoryBtn.prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Saving...'
        );


        // Reset previous errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').empty();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')    
            },
            success: function(response) {
                // Add new option to subcategory select
                
                // Reset form and close modal
                $('#subCategoryForm')[0].reset();
                $('#addSubCategoryModal').modal('hide');

                // Show success message
                Swal.fire({
                    title: 'Success!',  
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = response.redirect_url;
                    }
                });
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Validation errors
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, name) {
                        $('#subcategory_' + key).addClass('is-invalid');
                        $('#subcategory-' + key + '-error').text(name);
                    });
                }
                else{
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
                // Show error message

            },
            complete: function() {
                // Reset button state
                $('#savesubCategoryBtn').prop('disabled', false).html(saveSubCategoryBtnText);

            }
        });
    });
});
//remove sub category
$(document).ready(function () {
    $('.remove-tag').click(function () {
        let button = $(this);
        let url = button.data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this sub category?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            button.closest('.badge').remove();

                            Swal.fire(
                                'Deleted!',
                                'Subcategory has been deleted.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Could not delete subcategory.',
                                'error'
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
//remove category
$(document).ready(function () {
    $('.remove-category').click(function () {
        let button = $(this);
        let url = button.data('url');
        let id = button.data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this category?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        button.closest('tr').remove();
                        if (response.success) {
                            button.closest('.badge').remove();

                            Swal.fire(
                                'Deleted!',
                                'Subcategory has been deleted.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Could not delete subcategory.',
                                'error'
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

$(document).ready(function () {
    $('.delete-product').click(function () {
        let button = $(this);
        let url = button.data('url');
        let id = button.data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            button.closest('tr').remove();
                            window.location.href = response.redirect_url;
                            Swal.fire(
                                'Deleted!',
                                'Product has been deleted.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Could not delete product.',
                                'error'
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

$(document).ready(function () {
    $('#category_id').change(function () {
        let selectedOption = $(this).find('option:selected');
        let url = selectedOption.data('url');
        let categoryId = selectedOption.val();
        let subcategoryDropdown = $('#subcategory_id');
        subcategoryDropdown.html('<option value="">Loading...</option>');
        if (categoryId && url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (res) {
                    subcategoryDropdown.empty();
                    if (res.subcategories && res.subcategories.length > 0) {
                        subcategoryDropdown.empty().append('<option value="">Select Sub Category</option>');
                        $.each(res.subcategories, function (index, sub) {
                            subcategoryDropdown.append(
                                $('<option>', {
                                    value: sub.id,
                                    text: sub.name
                                })
                            );
                        });
                        // Add required validation
                        subcategoryDropdown.attr('required', true);
                        subcategoryDropdown.attr('data-parsley-required', true);
                    } else {
                        subcategoryDropdown.append('<option value="">No Sub Categories Found</option>');
                        // Remove required validation if no options
                        subcategoryDropdown.removeAttr('required');
                        subcategoryDropdown.removeAttr('data-parsley-required');
                    }
                    
                },
                error: function () {
                    subcategoryDropdown.html('<option value="">Error loading subcategories</option>');
                }
            });
        } else {
            subcategoryDropdown.html('<option value="">Select Sub Category</option>');
            subcategoryDropdown.removeAttr('required data-parsley-required');
            $('#productForm').parsley().reset();

        }
    });
   // $('#category_id').trigger('change');
});
