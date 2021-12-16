<!DOCTYPE html>
<html>
<head>
	<title>WYSIWYG EDITOR (Chages WONT BE SAFED!)</title>
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<textarea name="editor" id="editor" placeholder="">
	Be careful: Changes wont be safed!<br>
	"Write something..."
</textarea>
<script>
	CKEDITOR.replace("editor");
</script>
</body>
</html>