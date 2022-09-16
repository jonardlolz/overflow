<style>
    .fas{
        margin-right: 5px;
    }
</style>
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="<?= base_url('home/index'); ?>" class="nav-link <?php if($this->uri->segment(1)=='home'){echo "active";} ?>">
            <i class="fas fa-tasks"></i>
            <p>To Dos</p>
        </a>
    </li>   
    <li class="nav-item">
        <a href="<?= base_url('notebook/index'); ?>" class="nav-link <?php if($this->uri->segment(1)=='notebook'){echo "active";} ?>">
            <i class="fas fa-sticky-note"></i>
            <p>Notes</p>
        </a>
    </li> 
</ul>