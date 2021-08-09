<div class="container">
    <h1>Add user</h1>
    <?php if (isset($errors)) : ?>
        <div class="alert alert-danger">
            <?= $errors ?>
        </div>
    <?php endif ?>
    <form action="save" method="post">
        <div class="mb-3 row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="Ivan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputLastName" class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Ivanov">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="mail" class="form-control" id="inputEmail" name="inputEmail" placeholder="email@example.com">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>