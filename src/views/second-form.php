
<h3>To participate in the conference, please fill out the form</h3>
<form role="form" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company"
               name="company"
               placeholder="Company">
        <div class="error-box"></div>
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" id="position"
               name="position"
               placeholder="Position">
        <div class="error-box"></div>
    </div>
    <div class="form-group">
        <label for="about">About me</label>
        <textarea type="text" class="form-control" name="about"
                  id="about"></textarea>
        <div class="error-box"></div>
    </div>

    <div class="form-group">
        <label for="photo">Photo</label>
            <span class="photo-upload-icon"><input type="file" class="form-control" name="photo" id="photo" multiple="multiple" accept="image/*"><img
                        src="" class="user-img" alt=""></span>
        <a href="#" class="upload">Upload</a>
        <div class="error-box"></div>
    </div>

    <button type="submit" id="nextSocial" name="nextSocial" class="btn btn-default">Next</button>
</form>
