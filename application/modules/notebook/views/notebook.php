<style>
   #notebooklist{
      min-width: 200px;
   }

   .notebook {
      transition: 0.2s;
   }

   .notebook:hover {
      background-color: #007bff;
      color: white;
   }

   .selected {
      background-color: #007bff;
      color: white;
   }

   #sortable {
      list-style-type: none;
   }
</style>

<div class="row">
   <div class="col-lg-3" style="max-width: 100%;">
      <div class="card" id="notebooklist">
         <div class="card-header d-flex align-items-center">
            <div class="card-title mr-auto">
               <h3>Notebooks</h3>
            </div>
            <div class="card-tools">
               <button class="btn btn-primary btn-xs" id="addnotebook"><i class="fas fa-sm fa-plus"></i></button>
            </div>
         </div>
         <ul class="list-group list-group-flush" id="cardlist" style="max-height: 675px; overflow: auto;">
            <?php if (!empty($notebooks)) : ?>
               <?php foreach ($notebooks as $notebook) : ?>
                  <?php if ($notebook['notebookid'] == $id) : ?>
                     <li class="list-group-item notebook selected" data-id="<?= $notebook['notebookid'] ?>" tabindex="-1">
                        <h5><?= ucfirst($notebook['title']) ?></h5>
                     </li>
                  <?php else : ?>
                     <li class="list-group-item notebook" data-id="<?= $notebook['notebookid'] ?>" tabindex="-1">
                        <h5><?= ucfirst($notebook['title']) ?></h5>
                     </li>
                  <?php endif; ?>
               <?php endforeach; ?>
            <?php else : ?>
               <li class="list-group-item d-flex justify-content-center align-items-center">
                  <span style="font-style: italic; color: grey;">No notebooks yet...</span>
               </li>
            <?php endif; ?>
         </ul>
      </div>
   </div>
   <div class="col notebookcontent">
      
   </div>
</div>

<script>
   $(document).ready(function() {

      $(document).on("click", ".notebook", function() {
         if ($(this).hasClass("selected")) {
            $(this).removeClass('selected');

            $(".notebookcontent").html("");
         } else {
            $(".notebook").removeClass('selected');

            $(this).addClass('selected');
            $(".notebookcontent").load("<?= base_url('notebook/viewnotebook'); ?>/" + $(this).attr('data-id'));

         }

      });

      $(document).on("click", ".notebook_title", function() {
         location.href = "<?= base_url('notebook/notes/'); ?>" + $(this).attr('data-id');
      });

      $(document).on("click", "#addnotebook", function() {
         uni_modal("Add Notebook", "<?= base_url('notebook/modal_notebook/addnotebook'); ?>");
      });

      $(document).on("click", ".editnotebook", function() {
         uni_modal("Edit Notebook", "<?= base_url('notebook/modal_notebook/editnotebook'); ?>/" + $(this).attr('data-id'));
      });

      $(document).on("click", "#deletenotebook", function() {
         Swal.fire({
            title: 'Are you sure?',
            text: "This can't be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  url: "<?= base_url('notebook/deletenotebook') ?>/" + $(this).attr('data-id'),
                  type: "post",
                  success: function(response) {
                     Swal.fire(
                        'Notebook has been deleted!',
                        '',
                        'success'
                     )
                     
                     $("#cardlist").load("<?= base_url('notebook/index'); ?> #cardlist", function() {
                        $(this).children(":first").unwrap();
                     });
                     $(".notebookcontent").html("");
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