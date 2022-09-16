<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Todos</h2>
                <div class="card-tools d-flex align-items-center" style="gap: 10px;">
                    <div style="display: inline;">
                        <input class="form-check-input show_deleted" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Show deleted
                        </label>
                    </div>
                    <!-- <button class="btn btn-warning btn-sm showdelete" data-id="1"><i class="fa fa-eye fa-sm"></i> Show Deleted</button> -->
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newtask"><i class="fa fa-plus fa-sm"></i> New</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" style="text-align: center;">
                    <thead>
                        <th>#</th>
                        <th>Todo Task</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="todos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {

        $(document).on("change", "input[name='todostartdate']", function() {
            $("input[name='todoenddate']").attr({
                "min": $(this).val()
            })
        });

        $(document).on("change", "input[name='todoenddate']", function() {
            $("input[name='todostartdate']").attr({
                "max": $(this).val()
            })
        });

        var table = $(".table").DataTable({
            responsive: "true",
            ajax: {
                url: "<?= base_url('home/showtodos') ?>",
                dataSrc: "",
            },
            columns: [{
                    data: "todoid"
                },
                {
                    data: "todotask"
                },
                {
                    data: "startdate"
                },
                {
                    data: "duedate"
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        if (row.is_delete == 1) {
                            return "<label style='color: red'>Deleted</label>"
                        }
                        if (row.status == 'To Do') {
                            return "<label style='color: blue'>" + row.status + "</label>"
                        } else if (row.status == 'In-progress') {
                            return "<label style='color: orange'>" + row.status + "</label>"
                        } else if (row.status == 'Hold') {
                            return "<label style='color: grey'>" + row.status + "</label>"
                        } else if (row.status == 'Done') {
                            return "<label style='color: green'>" + row.status + "</label>"
                        }
                        return row.status
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        if (row.is_delete == 1) {
                            return "<button data-id='" + row.todoid + "' class='btn btn-primary btn-sm todoretrieve'><i class='fas fa-undo'></i> Retrieve</button>"
                        } else {
                            return "<button data-id='" + row.todoid + "' class='btn btn-danger btn-sm tododelete'><i class='fas fa-trash'></i> Delete</button> <button data-id='" + row.todoid + "' class='btn btn-warning btn-sm todoedit'><i class='fas fa-edit'></i>Edit</button>"
                        }
                    }
                }
            ]
        });

        $(".show_deleted").change(function() {
            if ($(this).is(":checked")) {
                var show = 1
                $.ajax({
                    url: '<?= base_url('home/showtodos') ?>',
                    data: {
                        show: show
                    },
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        table.clear();
                        table.rows.add(response).draw();
                    }
                })
            } else {
                table.ajax.reload(null, false);
            }
        });

        var BASEURL = '<?= base_url(); ?>'


        $(document).on("click", ".todoedit", function() {
            $('#newtask').modal('show');
            $.ajax({
                url: BASEURL + 'home/fetchdata/' + $(this).attr('data-id'),
                dataType: 'json',
                success: function(response) {
                    $("#taskid").val(response.todoid);
                    $("#todotask").val(response.todotask);
                    $("#taskstartdate").val(response.startdate);
                    $("#taskduedate").val(response.duedate);
                    $("select[name='todostatus']").val(response.status);
                    $(".status").show();
                }
            })
        });

        $(document).on("click", ".tododelete", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can retrieve deleted tasks later.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: BASEURL + 'home/delete/' + $(this).attr('data-id'),
                        success: function(response) {
                            if (response == 'true') {
                                Swal.fire(
                                        'Deleted!',
                                        'Your task has been deleted.',
                                        'success'
                                    ),
                                    table.ajax.reload(null, false);
                            } else {

                            }
                        }
                    })
                }
            })
        });

        $(document).on("click", ".todoretrieve", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can delete tasks later.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, retrieve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: BASEURL + 'home/retrieve/' + $(this).attr('data-id'),
                        success: function(response) {
                            if (response == 'true') {
                                Swal.fire(
                                        'Retrieved!',
                                        'Your task has been retrieved.',
                                        'success'
                                    ),
                                    table.ajax.reload(null, false);
                            } else {

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
                    url: BASEURL + 'home/newtask',
                    type: "post",
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response == 'added') {
                            Swal.fire(
                                    'Task has been added!',
                                    '',
                                    'success'
                                ),
                                $("#newtask").modal('hide');
                            // showdata();
                            table.ajax.reload(null, false);
                        } else if (response == 'editted') {
                            Swal.fire(
                                    'Task has been editted!',
                                    '',
                                    'success'
                                ),
                                $("#newtask").modal('hide');
                            table.ajax.reload(null, false);
                        }
                    }
                })
            }
        });
    });
</script>