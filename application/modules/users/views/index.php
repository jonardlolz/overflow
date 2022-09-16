<form action="<?= base_url("users/insert"); ?>" method="post">
    <label>
        First Name
        <input name="Firstname" type="text">
    </label>
    <label>
        Last Name
        <input name="Lastname" type="text">
    </label>
    <label>
        Email
        <input name="Email" type="text">
    </label>
    <label>
        Password
        <input name="Password" type="password">
    </label>
    <input type="submit" value="Submit">
</form>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($list)) : ?>

                <?php foreach ($list as $user) : ?>
                    <tr>
                        <td><?= $user['usersid'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                    </tr>
                <?php endforeach; ?>

            <?php else : ?>
                <td rowspan="4">No Data found...</td>
            <?php endif; ?>
        </tbody>
    </table>
</div>