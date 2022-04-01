                //Function CONFIRM DELETE MODAL
    $('#deleteModal').on('shown.bs.modal', function (event) {
    var button = $(event.relatedTarget); //Button that triggered the modal
    var recipientId = button.data('id'); //data-id
    console.log(recipientId);

    var modal = $(this);
    modal.find('#index_id').val(recipientId); // input type hidden capture id, if type text show id
    })
