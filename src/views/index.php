<?php require_once 'header.php'; ?>
<div id="map"></div>
<div class="container">
    <h3>To participate in the conference, please fill out the form</h3>
    <form role="form" method="post">

        <div class="form-group">
            <label for="firstName">Company</label>
            <input type="text" class="form-control" id="company"
                   name="company" placeholder="Company">
        </div>
        <div class="form-group">
            <label for="lastName">Position</label>
            <input type="text" class="form-control" id="position"
                   name="position"
                   placeholder="Position">
        </div>
        <div class="form-group">
            <label for="birthdate">About me</label>
            <textarea class="form-control" name="about"
                      id="about"></textarea>
        </div>

        <div class="form-group">
            <label for="birthdate">Photo</label>
            <input type="file" class="form-control" name="photo"
                   id="photo"
                   placeholder="photo">
        </div>


        <button type="submit" class="btn btn-default">Next</button>
    </form>
</div>

<?php require_once 'footer.php'; ?>
