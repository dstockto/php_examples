<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Upload Progress Demo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/upload.js"></script>
</head>
<body>
<div class="container">
    <h1>Upload Progress Demo</h1>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            <span class="progress-text">0% Complete</span>
        </div>
    </div>
    <form action="/upload.php" method="POST" enctype="multipart/form-data" id="upload">
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="123" />
            <input type="file" id="exampleInputFile1">
            <input type="file" id="exampleInputFile2">
            <p class="help-block">Upload a file to test the form upload progress.</p>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

</body>
</html>
