 @push('scripts')
     <script>
         $('.delete-item').click(function(e) {
             e.preventDefault();
             $(this).data('url');
             let btn = $(this);
             Swal.fire({
                 title: "{{ __('messages.are_you_sure') }}",
                 text: "{{ __('messages.you_wont_be_able_to_revert_this') }}",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#3085d6",
                 cancelButtonColor: "#d33",
                 confirmButtonText: "{{ __('messages.yes_delete_it') }}",
                 cancelButtonText: "{{ __('messages.cancel') }}",
             }).then((result) => {
                 if (result.isConfirmed) {
                     $.ajax({
                         url: btn.data('url'),
                         method: 'DELETE',
                         data: {
                             _token: '{{ csrf_token() }}',
                         },
                         success: function(result) {
                             $('#' + btn.data('id')).remove();
                             Swal.fire({
                                 title: "{{ __('messages.deleted') }}",
                                 text: result.message,
                                 icon: "success"
                             });
                         },
                         error: function(error) {
                             Swal.fire({
                                 icon: "error",
                                 title: "{{ __('messages.opps') }}...",
                                 text: "{{ __('messages.something_went_wrong') }}",
                             });
                         }
                     });

                 }
             });
         })
     </script>
 @endpush
