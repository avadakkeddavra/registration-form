
<h3>To participate in the conference, please fill out the form</h3>
<a href="/main/allMembers" class="btn-template all-members">All Members</a>
<div id=""></div>
<form role="form" id="second_form" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" id="company"
               name="company"
               placeholder="Company" maxlength="256">
        <div class="error-box"></div>
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" id="position"
               name="position"
               placeholder="Position" maxlength="256">
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
                        src="" class="user-img" alt=""><div class="error-box"></div></span>
        <span class="upload btn-template">Upload</span>

    </div>
    <div class="error-box"></div>
    <button type="submit" id="nextSocial" name="nextSocial" class="btn btn-primary">Next</button>
</form>
</div>
