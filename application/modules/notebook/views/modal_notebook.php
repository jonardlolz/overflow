<?php if ($this->uri->segment(3) == 'editnotebook') : ?>
   <?php $data = $this->model->getRow('*', 'notebook', 'notebookid = ' . $this->uri->segment(4)); ?>

   <form action="#" id="uni_modalform" method="POST">
      <div class="form-group">
         <label for="">Notebook title</label>
         <input name="title" type="text" class="form-control" autocomplete="off" placeholder="Title..." value="<?= $data['title'] ?>" required>
      </div>
   </form>

   <script>
      $(document).ready(function() {

         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
         })

         $("#uni_modalform").validate({
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
               var test = $("#cardlist").find(".selected").attr("data-id");

               $.ajax({
                  url: "<?= base_url('notebook/editnotebook'); ?>/" + "<?= $this->uri->segment(4) ?>",
                  type: "post",
                  data: $(form).serialize(),
                  success: function(response) {
                     Toast.fire({
                        icon: 'success',
                        title: 'Notebook successfully editted'
                     })
                     $("#uni_modal").modal('hide');
                     $("#cardlist").load("<?= base_url('notebook/index'); ?>/" + test + " #cardlist", function() {
                        $(this).children(":first").unwrap();
                     });
                     $("#notebookcard").load("<?= base_url('notebook/viewnotebook/') . $this->uri->segment(4) ?> #notebookcard", function() {
                        $(this).children(":first").unwrap();
                     });
                  }
               });
            }
         });
      });
   </script>

<?php elseif ($this->uri->segment(3) == 'addnotebook') : ?>
   <form action="#" id="uni_modalform" method="POST">
      <div class="form-group">
         <label for="">Notebook title</label>
         <input name="title" type="text" class="form-control" placeholder="Title..." autocomplete='off' required>
      </div>
   </form>

   <script>
      $(document).ready(function() {

         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
         })

         $("#uni_modalform").validate({
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
               var test = $("#cardlist").find(".selected").attr("data-id");

               $.ajax({
                  url: "<?= base_url('notebook/addnotebook'); ?>",
                  type: "post",
                  data: $(form).serialize(),
                  success: function(response) {
                     Toast.fire({
                        icon: 'success',
                        title: 'Notebook added'
                     })
                     $("#uni_modal").modal('hide');
                     $("#cardlist").load("<?= base_url('notebook/index'); ?>/" + test + " #cardlist", function() {
                        $(this).children(":first").unwrap();
                     });

                  }
               });
            }
         });
      });
   </script>

<?php elseif ($this->uri->segment(3) == 'addnotes') : ?>
   <form action="#" id="uni_modalform" method="POST">
      <div class="form-group">
         <label for="">Content</label>
         <input name="content" type="text" class="form-control" placeholder="Type note here..." autocomplete='off' required>
      </div>
   </form>

   <script>
      $(document).ready(function() {

         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
         })

         $("#uni_modalform").validate({
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
                  url: "<?= base_url('notebook/addnotes/'); ?>" + "<?= $this->uri->segment(4) ?>",
                  type: "post",
                  data: $(form).serialize(),
                  success: function(response) {
                     Toast.fire({
                        icon: 'success',
                        title: 'Note added'
                     })
                     $("#uni_modal").modal('hide');
                     $("#shownotebook").load("<?= base_url('notebook/viewnotebook/') . $this->uri->segment(4) ?> #notebookrow");
                  }
               });
            }
         });
      });
   </script>

<?php endif; ?>