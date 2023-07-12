<div class="modal fade" id="remove_Modal" tabindex="-1" role="dialog" aria-labelledby="remove_ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove your previous items?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You have already selected different restaurant. If you continue your cart and selection will be removed.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="removeButton1">Remove</button>
      </div>
    </div>
  </div>
</div>

<form action="/partials/_removeAndAdd.php" method="POST" id="removeAndAdd" name="removeAndAdd" hidden>
  <input type="number" id="modalFood" name="addFood">
  <input type="number" id="modalUser" name="addUser">
</form>

<script>
  document.getElementById('modalFood').value = sessionStorage.getItem('removeModalFood');
  document.getElementById('modalUser').value = sessionStorage.getItem('removeModalUser');
  document.getElementById('removeButton1').onclick = function(){
      window.removeAndAdd.submit();
  };
</script>