<style>
  /* .notebook .card-header:hover {
    background-color: #007bff;
    color: white;
  }

  .notebook .card-header:hover ~ .card-tools .btn {
    color: white;
  } */
</style>
<div class="card" id="notebookcard">
  <div class="card-header d-flex align-items-center">
    <div class="card-title mr-auto">
      <h3><?= ucfirst($notes[0]['title']) ?></h3>
    </div>
    <div class="card-tools">
      <button class="btn btn-xs bg-orange" data-id="<?= $this->uri->segment(3) ?>" id="editnotebook"><i class="fa fa-pencil-alt" style="color: white;"></i></button>
      <button class="btn btn-xs btn-danger" data-id="<?= $this->uri->segment(3) ?>" id="deletenotebook"><i class="fas fa-trash"></i></button>
      <button class="btn btn-xs btn-primary" data-id="<?= $this->uri->segment(3) ?>" id="addnotes"><i class="fas fa-plus"></i></button>
    </div>
  </div>
  <div class="card-body" id="shownotebook">
    <div class="row sortable" id="notebookrow">
      <?php if (!empty($notes[0]['content'])) : ?>
        <?php foreach ($notes as $note) : ?>
          <?php if ($note['is_delete'] != 0) : ?>
            <?php continue; ?>
          <?php endif; ?>
          <div class="col-sm-3">
            <div class="card notes position-relative" data-id="<?= $note['notesid'] ?>">
              <div class="card-content">
                <div class="card-body d-flex" style="word-break: break-all;">
                  <div class="mr-auto">
                    <h3 class=""><?= mb_strimwidth(ucfirst($note['content']), 0, 50, "…"); ?></h3>
                  </div>
                  <div class="d-flex align-self-start">
                    <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item editnotebook" href="#" data-id="<?= $note['notesid'] ?>">Edit</a>
                      <a class="dropdown-item deletenote" href="#" data-id="<?= $note['notesid'] ?>">Delete</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="col-sm-12">
          <div class="alert alert-danger text-center">
            This notebook is empty!
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>




<script>
  $(document).ready(function() {

    // $(".sortable").sortable();

    $(document).on("click", ".notes", function() {
      uni_modal("Test", "test");
    });

    if ($("#notebookrow:has(*)").length <= 0) {
      $("#notebookrow").html("<div class='col-sm-12'><div class='alert alert-danger text-center'>This notebook is empty!</div></div>");
    }

    $(document).on("click", ".notebook_title", function() {
      location.href = "<?= base_url('notebook/notes/'); ?>" + $(this).attr('data-id');
    });

    $(document).on("click", "#addnotes", function() {
      uni_modal("Add Notes", "<?= base_url('notebook/modal_notebook/addnotes/'); ?>" + $(this).attr('data-id'));
    });

    $(document).on("click", "#editnotebook", function() {
      uni_modal("Edit Notebook", "<?= base_url('notebook/modal_notebook/editnotebook/'); ?>/" + $(this).attr('data-id'));
    });

    $(document).on("click", ".deletenote", function() {
      Swal.fire({
        title: "Are you sure?",
        text: "This can't be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "<?= base_url("notebook/deletenote/") ?>" + $(this).attr("data-id"),
            type: "post",
            success: function(response) {
              if (response == "updated") {
                Swal.fire(
                  "Notebook has been deleted!",
                  "",
                  "success"
                )
                $(".notebookcontent").load("<?= base_url("notebook/viewnotebook/") . $this->uri->segment(3) ?>");
              }
            }
          })
        }
      })
    });

    $("#modalform").validate({
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      submitHandler: function(form) {
        $.ajax({
          url: BASEURL + 'notebook/addnotebook',
          type: "post",
          data: $(form).serialize(),
          success: function(response) {
            if (response == 'added') {
              Swal.fire(
                  'Task has been added!',
                  '',
                  'success'
                ),
                $("#exampleModalCenter").modal('hide');
            } else if (response == 'editted') {
              Swal.fire(
                  'Task has been editted!',
                  '',
                  'success'
                ),
                $("#exampleModalCenter").modal('hide');
            }
          }
        })
      }
    });
  });
</script>