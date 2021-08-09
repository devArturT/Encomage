<div class="container">
    <h1>User list</h1>

    <div class="d-flex">
        <table>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create date</th>
                    <th scope="col">Last modifed</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <input class="form-control me-2" id="filter_id" type="text" placeholder="Id"> </td>
                    <td> <input class="form-control me-2" id="filter_first_name" type="text" placeholder="First name"> </td>
                    <td> <input class="form-control me-2" id="filter_last_name" type="text" placeholder="Last name"> </td>
                    <td> <input class="form-control me-2" id="filter_email" type="text" placeholder="Email"> </td>
                    <td> <input class="form-control me-2" id="filter_create_date_from" type="datetime-local" placeholder="Create date: from"> </td>
                    <td> <input class="form-control me-2" id="filter_modifed_date_from" type="datetime-local" placeholder="Last modifed: from"> </td>
                    <td> <button class="btn btn-outline-success" id="button_filter">Filter</button> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> <input class="form-control me-2" id="filter_create_date_to" type="datetime-local" placeholder="Create date: to"> </td>
                    <td> <input class="form-control me-2" id="filter_modifed_date_to" type="datetime-local" placeholder="Last modifed: to"> </td>
                </tr>
            </tbody>
        </table>
</div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <button type="button" class="btn btn-light" id="button_id">Id</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-light" id="button_first_name">First name</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-light" id="button_last_name">Last name</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-light" id="button_email">Email</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-light" id="button_create_date">Create date</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-light" id="button_last_modifed">Last modifed</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-light" disabled>Action</button>
                </th>
            </tr>
        </thead>
        <tbody id="table">
            <?php foreach ($users as $this_user) : ?>
                <tr class="th_row">
                    <td class="col_id"><?= $this_user->id ?></th>
                    <td class="col_first_name"><?= $this_user->first_name ?></td>
                    <td class="col_last_name"><?= $this_user->last_name ?></td>
                    <td><?= $this_user->email ?></td>
                    <td><?= $this_user->create_date ?></td>
                    <td><?= $this_user->update_date ?></td>
                    <td><a href="edit?id=<?= $this_user->id ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>